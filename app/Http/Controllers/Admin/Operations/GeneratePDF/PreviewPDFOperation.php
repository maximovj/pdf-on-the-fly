<?php

namespace App\Http\Controllers\Admin\Operations\GeneratePDF;

use Illuminate\Support\Facades\Route;

trait PreviewPDFOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupPreviewPDFRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/previewpdf', [
            'as'        => $routeName.'.previewpdf',
            'uses'      => $controller.'@previewpdf',
            'operation' => 'generate_pdf-spreviewpdf',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupPreviewPDFDefaults()
    {
        $this->crud->allowAccess('generate_pdf-previewpdf');

        $this->crud->operation('generate_pdf-previewpdf', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation(['list', 'show'], function () {
            // $this->crud->addButton('top', 'generate_pdf-previewpdf', 'view', 'crud::buttons.previewpdf');
            $this->crud->addButton('line', 'generate_pdf-previewpdf', 'view', 'crud::buttons.generate_pdf.previewpdf', 'beginning');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
    public function previewpdf()
    {
        $this->crud->hasAccessOrFail('previewpdf');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->getTitle() ?? 'previewpdf '.$this->crud->entity_name;

        // load the view
        return view("crud::operations.previewpdf", $this->data);
    }
}
