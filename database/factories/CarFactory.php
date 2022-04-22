<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Make;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $n = rand(1, 78);
        $make = Make::find($n);
        $model = $make->models()->inRandomOrder()->first();
        $year = $model->years()->inRandomOrder()->first();
        // dd(['make' => $make, 'model' => $model, 'year' => $year]);
        return [
            'company_id' => $this->faker->numberBetween(1, 100),
            'motor' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'trademark' => $make->make,
            'model' => $model->model,
            'year' => $year->year,
            'plate' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            // 'status' => $this->faker->randomElement(['available', 'sold']),
            'serie' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'cil' => rand(3, 32),
            'size' => $this->faker->randomElement(['xs', 'small', 'medium', 'large', 'xl']),
        ];
    }
}
