<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function sleepHabits()
    {
        return $this->hasMany(SleepHabit::class);
    }

    public function moods()
    {
        return $this->hasMany(Mood::class);
    }

    public function userWeights()
    {
        return $this->hasMany(UserWeight::class);
    }

    public function dailyStepsGoals()
    {
        return $this->hasMany(DailyStepsGoal::class);
    }

    public function dailyDistanceGoals()
    {
        return $this->hasMany(DailyDistanceGoal::class);
    }

    public function popGoals()
    {
        return $this->hasMany(PopGoal::class);
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'competitions_users', 'user_id', 'competition_id')->withPivot('current_amount', 'order_finished', 'comment');
    }
}
