<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CompetitionUser extends Pivot
{
    use HasFactory;

    protected $fillable = ['comment', 'current_amount', 'order_finished'];

    /**
 * Indicates if the IDs are auto-incrementing.
 *
 * @var bool
 */
public $incrementing = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
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