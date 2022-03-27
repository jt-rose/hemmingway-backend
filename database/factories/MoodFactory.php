<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mood>
 */
class MoodFactory extends Factory
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
            'meditated' => $this->faker->boolean(),
            'date_of_mood' => $this->faker->date(),
            'stress_level' => 'MODERATE',
            'mood_type' => 'SATISFIED',
            'user_id' => function() {
                return User::factory()->create()->id;
            }
        ];
    }
}