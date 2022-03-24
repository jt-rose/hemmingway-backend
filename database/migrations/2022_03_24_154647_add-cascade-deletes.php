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
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->unique()->change();
            });
        Schema::table('meals', function (Blueprint $table) {
            $table->dropColumn('user_id');
            //$table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            });
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropColumn('user_id');
            //$table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            });
        Schema::table('sleep_habits', function (Blueprint $table) {
            $table->dropColumn('user_id');
            //$table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            });
        Schema::table('moods', function (Blueprint $table) {
            $table->dropColumn('user_id');
            //$table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
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
