<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'calories', 'date_of_meal', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
