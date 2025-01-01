<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ViewFormRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ViewFormCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ViewFormCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use \App\Http\Controllers\Admin\Operations\ViewForm\GeneratePDFOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ViewForm::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/view-form');
        CRUD::setEntityNameStrings('Formularios', 'Formularios');
        CRUD::setTitle('Formularios');
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
     * @return void
     */
    protected function setupListOperation()
    {
        $this->addColumns();

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function addColumns()
    {

        $this->crud->addColumn([
            'name' => 'file_pdf.id',
            'type' => 'text',
            'label' => 'ID del archivo',
        ]);

        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Nombre del formulario',
        ]);

        $this->crud->addColumn([
            'name' => 'file_pdf.file_name',
            'type' => 'text',
            'label' => 'Nombre del archivo',
        ]);

        $this->crud->addColumn([
            'name' => 'file_pdf.file_extension',
            'type' => 'text',
            'label' => 'Extensión del archivo',
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
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ViewFormRequest::class);
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
            'name' => 'file_pdf_id',
            'type' => 'select2',
            'label' => 'Archivo PDF',
            'allows_null' => false,

            // optional
            'entity'    => 'file_pdf', // the method that defines the relationship in your Model
            'model'     => "App\Models\FilePDF", // foreign key model
            'attribute' => 'name', // foreign key attribute that is shown to user
            //'default'   => 2, // set the default value of the select2

            // also optional
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->whereNotNull('file_storage')->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Nombre',
        ]);

        $this->crud->addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => 'Descripción',
        ]);
    }
}
