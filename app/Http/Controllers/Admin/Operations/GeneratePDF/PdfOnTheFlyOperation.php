<?php

namespace App\Http\Controllers\Admin\Operations\GeneratePDF;

use Illuminate\Support\Facades\Route;

trait PdfOnTheFlyOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupPdfOnTheFlyRoutes($segment, $routeName, $controller)
    {
        // Se elimina rutas
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupPdfOnTheFlyDefaults()
    {
        $this->crud->allowAccess('generate_pdf-pdfonthefly');

        $this->crud->operation('generate_pdf-pdfonthefly', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation(['list', 'show'], function () {
            // $this->crud->addButton('top', 'generate_pdf-pdfonthefly', 'view', 'crud::buttons.pdfonthefly');
            $this->crud->addButton('line', 'generate_pdf-pdfonthefly', 'view', 'crud::buttons.generate_pdf.pdfonthefly', 'beginning');
        });
    }

}
