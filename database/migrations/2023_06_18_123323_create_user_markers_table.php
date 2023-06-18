<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_markers', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->references('id')->on('users');
            $table->integer('id_game')->references('id')->on('games');
            $table->integer('id_marker')->references('id')->on('markers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_markers');
    }
};
