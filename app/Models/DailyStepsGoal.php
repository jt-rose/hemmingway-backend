<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyStepsGoal extends Model
{
    use HasFactory;

    protected $fillable = ['goal_start_date', 'daily_goal_in_steps','note', 'active'];
}