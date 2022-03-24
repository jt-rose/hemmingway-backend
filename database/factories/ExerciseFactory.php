<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
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
            'date_of_exercise' => $this->faker->date(),
            'minutes' => $this->faker->randomNumber(),
            'user_id' => function() {
                return User::factory()->create()->id;
            }
        ];
    }
}
