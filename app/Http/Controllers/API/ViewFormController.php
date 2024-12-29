<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GeneratePDF;
use App\Models\ViewForm;
use Illuminate\Http\Request;

class ViewFormController extends Controller
{

    public function generate_pdf(Request $request, int $id)
    {
        $view_form = ViewForm::find($id);
        if($view_form == null) {
            return response()->json([
            'title' => 'Generar PDF',
            'message' => 'Formulario no encontrado',
            'success' => false,
            'data' => $view_form,
        ], 404);
        }

        return response()->json([
            'title' => 'Generar PDF',
            'message' => 'Generando archivo PDF ',
            'success' => true,
            'data' => $view_form,
        ], 200);
    }

    public function save_pdf(Request $request, int $id)
    {
        $view_form = ViewForm::find($id);
        if($view_form == null) {
            return response()->json([
                'title' => 'Generar PDF',
                'message' => 'Formulario no encontrado',
                'success' => false,
                'data' => $view_form,
            ], 404);
        }

        return response()->json([
            'title' => 'Generar PDF',
            'message' => 'Archivo generado exitosamente',
            'success' => true,
            'data' => $view_form,
        ], 200);
    }

    public function save_draft(Request $request, int $id)
    {
        $view_form = ViewForm::find($id);
        if($view_form == null) {
            return response()->json([
                'title' => 'Generar PDF',
                'message' => 'Formulario no encontrado',
                'success' => false,
                'data' => $view_form,
            ], 404);
        }

        $fields = json_encode(request('fields'));
        $ip = request()->ip();

        $conditions = [
            'file_pdf_id' => $view_form->file_pdf->id,
            'ip' => $ip,
            'generated' => false,
        ];

        $generatePDF = GeneratePDF::updateOrCreate(
            $conditions,
            [
                'file_pdf_id' => $view_form->file_pdf->id,
                'name' => $view_form->name,
                'description' => $view_form->description,
                'fields' => $fields,
                'generated' => false,
            ]
        );

        return response()->json([
            'title' => 'Generar PDF',
            'message' => 'Formulario guardado como borrador',
            'success' => true,
            'data' => [
                'generate_pdf' => $generatePDF->id,
            ],
        ], 200);
    }

}
