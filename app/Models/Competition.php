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

// Schema::create('competitions_users', function (Blueprint $table) {
//     $table->id('id');        
//     $table->integer('user_id');
//     $table->foreign('user_id')
//           ->references('id')
//           ->on('users')->onDelete('cascade');
//     $table->integer('competition_id');
//     $table->foreign('competition_id')
//           ->references('id')
//           ->on('competitions')->onDelete('cascade');
//     $table->text('comment');
//     $table->decimal('current_amount', $precision = 5, $scale = 1);
//     $table->integer('order_finished');
// });