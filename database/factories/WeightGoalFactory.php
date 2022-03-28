<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeightGoal>
 */
class WeightGoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'goal_in_lbs' => $this->faker->randomNumber(),
            'goal_start_date' => $this->faker->date(),
            'active' => $this->faker->boolean(),
            'note' => $this->faker->sentence(),
            'user_id' => function() {
                return User::factory()->create()->id;
            }
        ];
    }
}