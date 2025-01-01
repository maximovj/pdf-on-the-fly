<?php

namespace App\Http\Controllers\Admin\Operations\GeneratePDF;

use Illuminate\Support\Facades\Route;

trait DownloadPDFOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupDownloadPDFRoutes($segment, $routeName, $controller)
    {

    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupDownloadPDFDefaults()
    {
        $this->crud->allowAccess('generate_pdf-downloadpdf');

        $this->crud->operation('generate_pdf-downloadpdf', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation(['list', 'show'], function () {
            // $this->crud->addButton('top', 'generate_pdf-downloadpdf', 'view', 'crud::buttons.downloadpdf');
            $this->crud->addButton('line', 'generate_pdf-downloadpdf', 'view', 'crud::buttons.generate_pdf.downloadpdf', 'beginning');
        });
    }


}
