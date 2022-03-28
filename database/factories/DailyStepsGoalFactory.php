<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyStepsGoal>
 */
class DailyStepsGoalFactory extends Factory
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
            'active' => $this->faker->boolean(),
            'goal_start_date' => $this->faker->date(),
            'daily_goal_in_steps' => $this->faker->randomNumber(),
            'user_id' => function() {
                return User::factory()->create()->id;
            }
        ];
    }
}
