<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleepHabit extends Model
{
    use HasFactory;

    protected $fillable = ['quality', 'amount', 'date_of_sleep', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
