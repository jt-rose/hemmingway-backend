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
        Schema::table('moods', function (Blueprint $table) {
            $table->enum('stress_level', ['LOW', 'MODERATE', 'HIGH']);
            $table->enum('mood_type', ['HAPPY',
                'MOTIVATED',
                'SATISFIED',
                'RELAXED',
                'TIRED',
                'FRUSTRATED',
                'SAD',
                'ANXIOUS']);
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
