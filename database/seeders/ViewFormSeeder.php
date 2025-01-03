<?php

namespace Database\Seeders;

use App\Models\ViewForm;
use Illuminate\Database\Seeder;

class ViewFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ViewForm::factory()->create([
            //'id' => 1,
            'file_pdf_id' => 3,
            'name' => 'Formulario 3',
            'description' => 'Este formulario está ligado con el archivo 3',
            'base_url' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ViewForm::factory()->create([
            //'id' => 2,
            'file_pdf_id' => 2,
            'name' => 'Formulario 2',
            'description' => 'Este formulario está ligado con el archivo 2',
            'base_url' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ViewForm::factory()->create([
            //'id' => 3,
            'file_pdf_id' => 1,
            'name' => 'Formulario 1',
            'description' => 'Este formulario está ligado con el archivo 1',
            'base_url' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
