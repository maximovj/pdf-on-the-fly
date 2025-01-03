<?php

namespace Database\Factories;

use App\Models\ViewForm;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewFormFactory extends Factory
{

    protected $model = ViewForm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_pdf_id' => null,
            'name' => $this->faker->name(),
            'description' => Str::substr($this->faker->paragraph(), 0, 60),
            'base_url' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
