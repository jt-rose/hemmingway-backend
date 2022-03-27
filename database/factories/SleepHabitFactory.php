<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SleepHabit>
 */
class SleepHabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'note' => $this->faker->sentence(),
            'date_of_sleep' => $this->faker->date(),
            'quality' => 'good',
            'amount' => 'few hours',
            'user_id' => function() {
                return User::factory()->create()->id;
            }
        ];
    }
}