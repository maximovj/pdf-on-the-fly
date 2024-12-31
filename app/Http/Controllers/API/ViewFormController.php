<?php

namespace App\Http\Controllers\API;

use App\Models\FilePDF;
use App\Models\ViewForm;
use App\Models\GeneratePDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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


        // * Obtener datos
        // !! :NOTA:
        // No es necesario serializarlo (o convertirlo en JSON)
        // por que fue enviado const formData = new FormData(); y JSON.stringify(jsonData.fields)
        $fields = request('fields');
        $ip = request()->ip();

        // * Crear carpeta para almacenar archivos PDF
        $pathDir = 'pdf-generates/IP' . Str::slug( $ip) . '-FILE' . $file_pdf->id . '/';
        Storage::makeDirectory($pathDir);

        // * Generar un nombre del archivo para descarga
        $downloadName = Str::slug($file_pdf->file_name)." - ".time().".pdf";

        // * Generar un nombre del archivo para almacenarlo en el servidor
        $filename = $file_pdf->id.'-'.Str::slug($file_pdf->file_name).'-'.time().'.'.'pdf';

        // * Recuperar el archivo de la consulta y salvar el archivo en el servidor
        $file = request()->file('pdfFile');
        //$path = $file->storeAs($pathDir, $filename);
        $path = Storage::disk('public')->putFileAs($pathDir, $file, $filename);

        $conditions = [
            'file_pdf_id' => $file_pdf->id,
            'ip' => $ip,
            'generated' => true,
        ];

        $generatePDF = GeneratePDF::updateOrCreate(
            $conditions,
            [
                'file_pdf_id' => $file_pdf->id,
                'name' => $file_pdf->name,
                'description' => $file_pdf->description,
                'path' => $path,
                'download' => $downloadName,
                'fields' => $fields,
                'generated' => true,
            ]
        );

        return response()->json([
            'title' => 'Generar PDF',
            'message' => 'Formulario guardado como borrador',
            'success' => true,
            'filePath' => $path,
            'downloadName' => $downloadName,
            'data' => [
                'generate_pdf' => $generatePDF->id,
            ],
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


        // * Obtener datos
        // !! :NOTA:
        // Es necesario serializarlo (o convertirlo en JSON)
        // por que fue enviado directamente desde `body: JSON.stringify(jsonData)`
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
