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
        Schema::create('exercises', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->foreignIdFor(User::class);
        $table->string('name');
        $table->integer('calories');
        $table->integer('minutes');
        $table->date('date_of_exercise');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('exercises');
    
    }
};
