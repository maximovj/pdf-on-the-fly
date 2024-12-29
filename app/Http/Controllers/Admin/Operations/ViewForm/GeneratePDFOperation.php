<?php

namespace App\Http\Controllers\Admin\Operations\ViewForm;

use Illuminate\Support\Facades\Route;
use Prologue\Alerts\Facades\Alert;

trait GeneratePDFOperation
{
    /**
     * Define which routes are needed for this operation.
     * @see https://backpackforlaravel.com/docs/4.1/crud-operations#command-line-tool
     * @see https://backpackforlaravel.com/docs/4.1/crud-operations#creating-a-new-operation-with-an-interface-1
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupGeneratePDFRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/{id}/generatepdf', [
            'as'        => $routeName.'.generatepdf',
            'uses'      => $controller.'@generatepdf',
            'operation' => 'view_form-generatepdf',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupGeneratePDFDefaults()
    {
        $this->crud->allowAccess('view_form-generatepdf');

        $this->crud->operation('view_form-generatepdf', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation('list', function () {
            // $this->crud->addButton('top', 'view_form-generatepdf', 'view', 'crud::buttons.generatepdf');
            $this->crud->addButton('line', 'view_form-generatepdf', 'view', 'crud::buttons.views_forms.generatepdf', 'beginning');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
    public function generatepdf($id)
    {
        $this->crud->hasAccessOrFail('view_form-generatepdf');

        $entry = $this->crud->getEntry($id) ?? $this->crud->getCurrentEntry();
        if($entry == null)
        {
            Alert::error('Lo siento, el elemento no fue encontrado')->flash();
            return redirect()->back();
        }

        // prepare the fields you need to show
        $this->data['entry'] = $entry;
        $this->data['crud'] = $this->crud;
        $this->data['title'] = 'Generar PDF';
        $this->data['subtitle'] = 'Detalles de <span class="badge badge-secondary">'.($entry->file_pdf->name??'No. #'.$entry->id).'</span>';


        // load the view
        //return view("crud::operations.generatepdf", $this->data);
        return view("pdfonthefly.views_forms.views_forms", $this->data);
    }
}
