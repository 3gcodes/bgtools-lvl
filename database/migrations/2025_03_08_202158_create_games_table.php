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
        Schema::create('games', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('bgg_id')->nullable(false);
            $table->string('name', 150)->nullable(false);
            $table->text('description')->nullable();
            $table->integer('year_published')->nullable();
            $table->integer('min_players')->nullable();
            $table->integer('max_players')->nullable();
            $table->string('image_url', 255)->nullable(false);
            $table->string('thumbnail_url', 255)->nullable();
            $table->timestamps();

            $table->index('bgg_id');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
