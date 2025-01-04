<?php

namespace Database\Seeders;

use App\Models\FilePDF;
use Illuminate\Database\Seeder;

class FilePDFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FilePDF::factory()->create([
            //'id' => 1,
            'name' => 'Archivo 1',
            'description' => 'Archivo 1',
            'file_name' => 'file-1-form.pdf',
            'file_extension' => '.pdf',
            'file_storage' => 'files_pdf/file_storage/IP-127001/1735882474-file-1-formpdf-1735882474.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        FilePDF::factory()->create([
            //'id' => 2,
            'name' => 'Archivo 2',
            'description' => 'Archivo 2',
            'file_name' => 'file-2-form.pdf',
            'file_extension' => '.pdf',
            'file_storage' => 'files_pdf/file_storage/IP-127001/1735882548-file-2-formpdf-1735882548.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        FilePDF::factory()->create([
            //'id' => 3,
            'name' => 'Archivo 3',
            'description' => 'Archivo 3',
            'file_name' => 'file-3-form.pdf',
            'file_extension' => '.pdf',
            'file_storage' => 'files_pdf/file_storage/IP-127001/1735882589-file-3-formpdf-1735882589.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
