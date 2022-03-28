<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWeight extends Model
{
    use HasFactory;

    protected $fillable = ['weight_in_lbs', 'amount', 'date_of_weight', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
