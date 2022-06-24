<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'address1' => $this->faker->streetAddress(),
            'address2' => '',
            'town' => $this->faker->city(),
            'county' => $this->faker->county(),
            'postcode' => $this->faker->postcode(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'notes' => $this->faker->paragraph(),
        ];
    }
}
