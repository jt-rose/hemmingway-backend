<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserWeight>
 */
class UserWeightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'weight_in_lbs' => $this->faker->randomNumber(),
            'date_of_weight' => $this->faker->date(),
            'note' => $this->faker->sentence(),
            'user_id' => function() {
                return User::factory()->create()->id;
            }
        ];
    }
}