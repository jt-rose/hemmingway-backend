<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Meal;
use App\Models\Mood;
use App\Models\SleepHabit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)
         ->has(Exercise::factory()->count(10))
         ->has(Meal::factory()->count(10))
         ->has(Mood::factory()->count(10))
         ->has(SleepHabit::factory()->count(10))
         ->create();
    }
}
