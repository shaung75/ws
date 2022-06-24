<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Piano>
 */
class PianoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'manufacturer_id' => 1,
            'model' => $this->faker->word(),
            'colour' => $this->faker->safeColorName(),
            'finish' => 'gloss',
            'serial_number' => uniqid(),
            'stock_number' => rand(0, 1000),
            'year_of_manufacture' => $this->faker->year(),
        ];
    }
}
