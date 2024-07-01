<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $start_at = $this->faker->dateTimeBetween('09:00', '11:00')->format('H:i:s');
        $end_at = $this->faker->dateTimeBetween($start_at, date('H:i:s', strtotime($start_at . ' +1 hours 30 minutes')))->format('H:i:s');
        return [
            'name' => $this->faker->name(),
            'start_at' => $start_at,
            'end_at' => $end_at,
            'date' => $this->faker->dateTimeBetween('2024-06-01', '2024-07-31')->format('Y-m-d'),
        ];
    }
}
