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
        Schema::create('players_games', function (Blueprint $table) {
            $table->uuid('player_id');
            $table->foreign('player_id')
                ->references('id')
                ->on('players')
                ->onDelete('cascade');
            $table->uuid('game_id');
            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');


            $table->unique(['player_id', 'game_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players_games');
    }
};
