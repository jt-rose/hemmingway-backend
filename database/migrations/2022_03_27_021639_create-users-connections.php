<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_to_users', function (Blueprint $table) {
            $table->id('id');        
            $table->integer('from');
            $table->foreign('from')
                  ->references('id')
                  ->on('users')->onDelete('cascade');
            $table->integer('to');
            $table->foreign('to')
                  ->references('id')
                  ->on('users')->onDelete('cascade');
            $table->enum('invite_status', ['PENDING', 'ACCEPTED', 'DECLINED']);
            $table->boolean('share_exercise_info');
            $table->boolean('share_calories_info');
            // - may add later $table->boolean('rival');
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
