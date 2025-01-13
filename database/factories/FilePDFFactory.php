<?php

namespace Database\Factories;

use App\Models\FilePDF;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilePDFFactory extends Factory
{

    protected $model = FilePDF::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => Str::substr($this->faker->paragraph(), 0, 60),
            'file_name' => Str::slug(Str::substr($this->faker->paragraph(), 0, 12)).'.pdf',
            'file_extension' => '.pdf',
            'file_storage' => 'path',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
