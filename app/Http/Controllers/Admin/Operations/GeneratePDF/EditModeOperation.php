<?php

namespace App\Http\Controllers\Admin\Operations\GeneratePDF;

use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Route;

trait EditModeOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupEditModeRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/{id}/editmode', [
            'as'        => $routeName.'.editmode',
            'uses'      => $controller.'@editmode',
            'operation' => 'generate_pdf-editmode',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupEditModeDefaults()
    {
        $this->crud->allowAccess('generate_pdf-editmode');

        $this->crud->operation('generate_pdf-editmode', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation('list', function () {
            // $this->crud->addButton('top', 'generate_pdf-editmode', 'view', 'crud::buttons.editmode');
            $this->crud->addButton('line', 'generate_pdf-editmode', 'view', 'crud::buttons.generate_pdf.editmode', 'beginning');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
    public function editmode($id)
    {
        $this->crud->hasAccessOrFail('generate_pdf-editmode');

        $entry = $this->crud->getEntry($id) ?? $this->crud->getCurrentEntry();
        if($entry == null)
        {
            Alert::error('Lo siento, el elemento no fue encontrado')->flash();
            return redirect()->back();
        }

        $view_form = $entry->file_pdf ?? null;
        if($view_form == null)
        {
            Alert::error('Lo siento, el elemento no fue encontrado')->flash();
            return redirect()->back();
        }

        // prepare the fields you need to show
        $this->data['entry'] = $entry;
        $this->data['entry_id'] = $entry->id;
        $this->data['view_form_id'] = $view_form->id;
        $this->data['ip'] = request()->ip();
        $this->data['origin'] = config('app.url');
        $this->data['crud'] = $this->crud;
        $this->data['title'] = 'Modo Edición PDF';
        $this->data['subtitle'] = 'Detalles de <span class="badge badge-secondary">'.($entry->file_pdf->name??'No. #'.$entry->id).'</span>';
        $this->data['pdfPath'] = asset('storage/' . $view_form->file_storage);

        // Recuperar las respuestas anteriores
        session(['edit_mode_fields' => json_decode($entry->fields, true)]);

        // load the view
        //return view("crud::operations.generatepdf", $this->data);
        return view("pdfonthefly.views_forms.views_forms", $this->data);
    }
}
