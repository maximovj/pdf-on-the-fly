<?php

namespace Database\Factories;

use App\Models\GeneratePDF;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneratePDFFactory extends Factory
{

    protected $model = GeneratePDF::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_pdf_id' => null,
            'view_form_id' => null,
            'ip' => null,
            'generated' => false,
            'download' => null,
            'path' => null,
            'fields' => null,
            'hash' => null,
            'count' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
