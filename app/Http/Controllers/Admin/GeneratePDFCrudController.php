<?php

namespace App\Http\Controllers\Admin;

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
        // Eliminar el contenido o vista de la operación `generate_pdf-editmode` y `show`
        // Se usa la vista `void` para eliminar el contenido de una operación
        $this->crud->addButtonFromView('line', 'generate_pdf-editmode', 'void', 'end');
        $this->crud->addButtonFromView('line', 'delete', 'void', 'end');
        $this->crud->addButtonFromView('line', 'show', 'void', 'end');

        // Se agrega una operación usando una vista blade
        $this->crud->addButtonFromView('line', 'actions', 'generate_pdf.actions', 'beginning');

        $this->addColumns();

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function addColumns()
    {
        $this->crud->column('id');

        $this->crud->addColumn([
            'name' => 'ip',
            'type' => 'text',
            'label' => 'Dirección IP',
        ]);

        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Nombre',
        ]);

        $this->crud->addColumn([
            'name' => 'description',
            'type' => 'text',
            'label' => 'Descripción',
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
