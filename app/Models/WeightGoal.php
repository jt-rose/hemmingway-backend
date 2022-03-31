<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightGoal extends Model
{
    use HasFactory;

    protected $fillable = ['goal_start_date', 'goal_in_lbs', 'active', 'note', 'goal_pace'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}