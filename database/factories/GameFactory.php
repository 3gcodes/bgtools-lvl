<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{

    public function definition(): array
    {
        return [
            'bgg_id' => fake()->unique()->randomNumber(),
            'name' => fake()->sentence(4),
            'description' => fake()->sentence(20),
            'year_published' => 2000,
            'min_players' => 1,
            'max_players' => 4,
            'image_url' => 'http://image',
            'thumbnail_url' => 'http://thumb'
        ];
    }
}
