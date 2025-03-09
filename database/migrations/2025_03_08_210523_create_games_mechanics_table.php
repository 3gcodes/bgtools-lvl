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
        Schema::create('games_mechanics', function (Blueprint $table) {
            $table->uuid('game_id');
            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');
            $table->uuid('mechanic_id');
            $table->foreign('mechanic_id')
                ->references('id')
                ->on('mechanics')
                ->onDelete('cascade');

            $table->unique(['game_id', 'mechanic_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_mechanics');
    }
};
