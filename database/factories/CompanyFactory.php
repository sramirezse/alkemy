<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'name' => $this->faker->company,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => json_encode([
                'street' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'state' => $this->faker->state,
                'zip' => $this->faker->postcode,
            ]),
            'logo' => $this->faker->imageUrl,
            'website' => $this->faker->url,
            'facebook' => $this->faker->url,
            'rfc' => $this->faker->regexify('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}'),

        ];
    }
}
