<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Date>
 */
class DateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            // 'date_description' => $this->faker->randomElement(['monday', 'tuesday', 'wednesday', 'thursday', 'friday','saturday','sunday']),
            // 'users_id' => User::first()
        ];
    }
}
