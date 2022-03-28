<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopGoal extends Model
{
    use HasFactory;

    protected $fillable = ['goal_amount', 'goal_type','date_of_goal'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}