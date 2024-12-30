<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FilePDF;
use App\Models\GeneratePDF;
use App\Models\ViewForm;
use Illuminate\Http\Request;

class ViewFormController extends Controller
{

    public function generate_pdf(Request $request, int $id)
    {
        $file_pdf = FilePDF::find($id);
        if($file_pdf == null) {
            return response()->json([
            'title' => 'Generar PDF',
            'message' => 'Formulario no encontrado',
            'success' => false,
            'data' => $file_pdf,
        ], 404);
        }

        return response()->json([
            'title' => 'Generar PDF',
            'message' => 'Generando archivo PDF ',
            'success' => true,
            'data' => $file_pdf,
        ], 200);
    }

    public function save_pdf(Request $request, int $id)
    {
        $file_pdf = FilePDF::find($id);
        if($file_pdf == null) {
            return response()->json([
                'title' => 'Generar PDF',
                'message' => 'Formulario no encontrado',
                'success' => false,
                'data' => $file_pdf,
            ], 404);
        }

        return response()->json([
            'title' => 'Generar PDF',
            'message' => 'Archivo generado exitosamente',
            'success' => true,
            'data' => $file_pdf,
        ], 200);
    }

    public function save_draft(Request $request, int $id)
    {
        $file_pdf = FilePDF::find($id);
        if($file_pdf == null) {
            return response()->json([
                'title' => 'Generar PDF',
                'message' => 'Formulario no encontrado',
                'success' => false,
                'data' => $file_pdf,
            ], 404);
        }

        $fields = json_encode(request('fields'));
        $ip = request()->ip();

        $conditions = [
            'file_pdf_id' => $file_pdf->id,
            'ip' => $ip,
            'generated' => false,
        ];

        $generatePDF = GeneratePDF::updateOrCreate(
            $conditions,
            [
                'file_pdf_id' => $file_pdf->id,
                'name' => $file_pdf->name,
                'description' => $file_pdf->description,
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
