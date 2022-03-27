<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'calories' => $this->faker->randomNumber(),
            'date_of_meal' => $this->faker->date(),
            'category' => 'lunch',
            'user_id' => function() {
                return User::factory()->create()->id;
            }
        ];
    }
}