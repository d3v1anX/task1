<?php

namespace Database\Factories;

use App\Models\Date;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_schedule' => $this->faker->time,
            'end_schedule' => $this->faker->time,
            // 'am_pm' => $this->faker->randomElement(['AM', 'PM']),
            // 'pm_am' => $this->faker->randomElement(['PM', 'AM']),
            'dates_id' => Date::all()->random()->id
        ];
    }
}
