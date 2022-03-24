<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date_of_competition', 'goal_amount', 'goal_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competitors()
    {
        return $this->belongsToMany(User::class, 'competitions_users', 'competition_id', 'user_id')->withPivot('current_amount', 'order_finished', 'comment');;
    }
}
