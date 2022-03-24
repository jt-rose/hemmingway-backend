<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('competitions', function (Blueprint $table) {
            $table->id('id');    
            $table->timestamps();    
            $table->string('name');
            $table->text('description');
            $table->date('date_of_competition');
            $table->decimal('goal_amount', $precision = 5, $scale = 1);
            $table->enum('goal_type', ['steps', 'miles', 'rounds']);
            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade'); // user is the creator of this competition
        });

        Schema::create('competitions_users', function (Blueprint $table) {
            $table->id('id');        
            $table->integer('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')->onDelete('cascade');
            $table->integer('competition_id');
            $table->foreign('competition_id')
                  ->references('id')
                  ->on('competitions')->onDelete('cascade');
            $table->text('comment');
            $table->decimal('current_amount', $precision = 5, $scale = 1);
            $table->integer('order_finished');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
