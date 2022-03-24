<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'calories', 'date_of_exercise', 'minutes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
