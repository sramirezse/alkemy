<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceDetail>
 */
class ServiceDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'title' => $this->faker->sentence,
            'duration' => $this->faker->time('H:i:s', 10),
        ];
    }
}
