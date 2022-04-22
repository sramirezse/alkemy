<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'company_id' => $this->faker->numberBetween(1, 10),
            'service_detail_id' => $this->faker->numberBetween(1, 10),
            'car_id' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->date('Y-m-d'),
            'start_time' => $this->faker->time('H:i:s', 10),
            'end_time' => $this->faker->time('H:i:s', 10),
        ];
    }
}
