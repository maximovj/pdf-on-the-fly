<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FilePDFRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FilePDFCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FilePDFCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\FilePDF::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/file-pdf');
        CRUD::setEntityNameStrings('Archivos PDF', 'Archivos PDF');
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
            'name' => 'name',
            'type' => 'text',
            'label' => 'Nombre',
        ]);

        $this->crud->addColumn([
            'name' => 'file_name',
            'type' => 'text',
            'label' => 'Nombre del archivo',
        ]);

        $this->crud->addColumn([
            'name' => 'file_extension',
            'type' => 'text',
            'label' => 'Extensión del archivo',
        ]);

        $this->crud->addColumn([
            'name' => 'file_storage',
            'type' => 'text',
            'label' => 'Ruta del archivo',
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
        CRUD::setValidation(FilePDFRequest::class);
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
            'name' => 'name',
            'type' => 'text',
            'label' => 'Nombre',
        ]);

        $this->crud->addField([
            'name' => 'file_name',
            'type' => 'text',
            'label' => 'Nombre del archivo',
        ]);

        $this->crud->addField([
            'name' => 'file_extension',
            'type' => 'text',
            'label' => 'Extensión del archivo',
        ]);

        $this->crud->addField([
            'name' => 'file_storage',
            'type' => 'text',
            'label' => 'Ruta del archivo',
        ]);

    }

}
