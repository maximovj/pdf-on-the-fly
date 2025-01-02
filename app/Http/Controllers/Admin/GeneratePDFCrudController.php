<?php

namespace App\Http\Controllers\Admin;

use App\Models\FilePDF;
use Illuminate\Support\Facades\DB;
use Prologue\Alerts\Facades\Alert;
use App\Http\Requests\GeneratePDFRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GeneratePDFCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GeneratePDFCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    //use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    //use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use \App\Http\Controllers\Admin\Operations\GeneratePDF\EditModeOperation;
    //use \App\Http\Controllers\Admin\Operations\GeneratePDF\DownloadPDFOperation;
    //use \App\Http\Controllers\Admin\Operations\GeneratePDF\PreviewPDFOperation;
    //use \App\Http\Controllers\Admin\Operations\GeneratePDF\PdfOnTheFlyOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\GeneratePDF::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/generate-pdf');
        CRUD::setEntityNameStrings('Generados PDF', 'Generados PDF');
        CRUD::addClause('where', 'ip', '=', request()->ip());
    }

    /**
     * Define what happens when the show operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/4.1/crud-operation-show#how-to-use
     * @return void
     */
    protected function setupShowOperation()
    {
        // by default the Show operation will try to show all columns in the db table,
        // but we can easily take over, and have full control of what columns are shown,
        // by changing this config for the Show operation
        $this->crud->set('show.setFromDb', false);
        $this->addColumns();

        $this->crud->addColumn([
            'name'     => 'fields',
            'label'    => 'Respuestas (JSON)',
            'type'     => 'toggle_json',
            'escaped' => false //optional, if the "value" should be escaped when displayed in the page.
        ]);

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @see  https://backpackforlaravel.com/docs/4.1/crud-buttons
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->orderBy('updated_at', 'desc');
        $this->addColumns();
        $this->addFilters();
        $this->crud->filters(); // gets all the filters

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function addColumns()
    {
        // Eliminar el contenido o vista de la operación `generate_pdf-editmode` y `show`
        // Se usa la vista `void` para eliminar el contenido de una operación
        $this->crud->addButtonFromView('line', 'generate_pdf-editmode', 'void', 'end');
        $this->crud->addButtonFromView('line', 'delete', 'void', 'end');
        $this->crud->addButtonFromView('line', 'show', 'void', 'end');

        // Se agrega una operación usando una vista blade
        $this->crud->addButtonFromView('line', 'actions', 'generate_pdf.actions', 'beginning');

        $this->crud->column('id');

        $this->crud->addColumn([
            'name' => 'view_form.name',
            'type' => 'text',
            'label' => 'Nombre del formulario',
            'orderable' => true, // Esto activa el ordenamiento
            'orderLogic' => function ($query, $column, $columnDirection) {
                return $query
                    ->join('views_forms', 'generates_pdf.view_form_id', '=', 'views_forms.id') // Realiza el join automáticamente
                    ->orderBy('views_forms.name', $columnDirection ?? 'asc');
            }
        ]);

        $this->crud->addColumn([
            'name' => 'file_pdf.file_name', // Relación seguida del campo relacionado
            'type' => 'text',
            'label' => 'Nombre del archivo',
            'orderable' => true, // Esto activa el ordenamiento
            'orderLogic' => function ($query, $column, $columnDirection) {
                return $query
                    ->join('files_pdf', 'generates_pdf.file_pdf_id', '=', 'files_pdf.id') // Realiza el join automáticamente
                    ->orderBy('files_pdf.file_name', $columnDirection ?? 'asc');
            },
        ]);

        $this->crud->addColumn([
            'name' => 'file_pdf.file_extension',
            'type' => 'text',
            'label' => 'Extensión del archivo',
            'orderable' => true, // Esto activa el ordenamiento
            'orderLogic' => function ($query, $column, $columnDirection) {
                return $query
                    ->join('files_pdf', 'generates_pdf.file_pdf_id', '=', 'files_pdf.id') // Realiza el join automáticamente
                    ->orderBy('files_pdf.file_extension', $columnDirection ?? 'asc');
            }
        ]);

        $this->crud->addColumn([
            'name'  => 'generated',
            'label' => 'Estado',
            'type'  => 'boolean',
            'options' => [0 => 'Borrador', 1 => 'Generado'],
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($column['text'] == 'Generado') {
                        return 'badge badge-success';
                    }

                    return 'badge badge-default';
                },
            ],
        ]);

        $this->crud->addColumn([
            'name' => 'count',
            'type' => 'number',
            'label' => 'Versión',
        ]);

        $this->crud->addColumn([
            'name' => 'updated_at',
            'type' => 'date',
            'label' => 'Última actualización',
            'format' => 'ddd d \d\e MMM \d\e Y',
        ]);

    }

    /**
     * Backpack CRUD allows you to show a filters bar right above the entries table.
     * When selected or modified, they reload the DataTables results.
     * The search will then search within the filtered elements.
     *
     * @see  https://backpackforlaravel.com/docs/4.1/crud-filters
     * @return void
     */
    protected function addFilters()
    {
        // Filtrar por archivos PDF disponibles
        $this->crud->addFilter([
            'name' => 'filter_file_pdf_id',
            'type' => 'dropdown',
            'label' => 'Archivos PDF',
        ],
        $values = function() {
            $arr_files_pdf = FilePDF::query()
            ->select(DB::raw('CONCAT(name," | ", file_name) AS full_name'), 'id')
            ->pluck('full_name', 'id')
            ->toArray();

            return $arr_files_pdf;
        },
        $filterLogic = function($value) {
            $this->crud->addClause('where', 'file_pdf_id', '=', $value);
        },
        $fallbackLogic = false);

        // Filtro paa filtrar por rango de fecha
        $this->crud->addFilter([
            'type' => 'date_range',
            'name' => 'range_updated_at',
            'label' => 'Última actualización',
        ],
        $values = false,
        $filterLogic = function($value) {
            $dates = json_decode($value);
            $this->crud->addClause('where', 'updated_at', '>=', $dates->from);
            $this->crud->addClause('where', 'updated_at', '<=', $dates->to . ' 23:59:59');
        },
        $fallbackLogic = false);

        // Filtro paa filtrar por nombre del formulario
        $this->crud->addFilter([
            'type' => 'text',
            'name' => 'view_form_name',
            'label' => 'Nombre del formulario',
        ],
        $values = false,
        $filterLogic = function($value) {
            // Usar la relación de la taba `view_form` dentro del modelo
            $this->crud->addClause('whereHas', 'view_form', function($query) use ($value) {
                // Buscar el nombre del archivo
                $query->where('name', 'like', "%$value%");
            });
        },
        $fallbackLogic = false);

        // Cantidad de versiones
        $this->crud->addFilter([
            'name'       => 'number_version',
            'type'       => 'range',
            'label'      => 'Versiones',
            'label_from' => 'min value',
            'label_to'   => 'max value'
          ],
          false,
          function($value) { // if the filter is active
              $range = json_decode($value);
              if ($range->from) {
                  $this->crud->addClause('where', 'count', '>=', (float) $range->from);
              }
              if ($range->to) {
                  $this->crud->addClause('where', 'count', '<=', (float) $range->to);
              }
          });

        // Filtro paa filtrar borradores
        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'draft',
            'label' => 'Borradores'
        ],
    false, // the simple filter has no values, just the "Draft" label specified above
        function() { // if the filter is active (the GET parameter "draft" exits)
            $this->crud->addClause('where', 'generated', 0);
            // we've added a clause to the CRUD so that only elements with draft=1 are shown in the table
            // an alternative syntax to this would have been
            // $this->crud->query = $this->crud->query->where('draft', 0);
            // another alternative syntax, in case you had a scopeDraft() on your model:
            // $this->crud->addClause('draft');
        });

        // Filtro paa filtrar generados
        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'generated',
            'label' => 'Generados'
        ],
    false, // the simple filter has no values, just the "generated" label specified above
        function() { // if the filter is active (the GET parameter "generated" exits)
            $this->crud->addClause('where', 'generated', 1);
            // we've added a clause to the CRUD so that only elements with draft=1 are shown in the table
            // an alternative syntax to this would have been
            // $this->crud->query = $this->crud->query->where('generated', 1);
            // another alternative syntax, in case you had a scopeDraft() on your model:
            // $this->crud->addClause('generated');
        });

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(GeneratePDFRequest::class);
        $this->addFields();

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function addFields()
    {
        $this->crud->addField([
            'name' => 'custom_html-fields-required',
            'type' => 'fields-required',
            'alert_type' => 'alert alert-primary',
        ]);

        $this->crud->addField([
            'name'  => 'ip',
            'label' => "Dirección IP",
            'default' => request()->ip(),
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingrese su dirección IP',
                'readonly'  => 'readonly',
            ], // extra HTML attributes and values your input might need
            'hint' => 'Se utiliza su dirección IP para guardar las respuestas.',
        ]);

        $this->crud->addField([
            'name'  => 'name',
            'label' => "Nombre",
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingrese su nombre',
            ], // extra HTML attributes and values your input might need
        ]);

        $this->crud->addField([
            'name'  => 'description',
            'label' => "Descripción",
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingrese una descripción',
            ], // extra HTML attributes and values your input might need
        ]);
    }
}
