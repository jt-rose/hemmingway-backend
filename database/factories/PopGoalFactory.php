<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PopGoal>
 */
class PopGoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'goal_amount' => $this->faker->randomNumber(),
            'date_of_goal' => $this->faker->date(),
            'goal_type' => 'STEPS',
            'user_id' => function() {
                return User::factory()->create()->id;
            }
        ];
    }
}