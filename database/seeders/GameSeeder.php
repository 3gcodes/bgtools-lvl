<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\Mechanic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = File::get('database/data/data.json');
        $data = json_decode($json);

        foreach ($data as $obj) {
            $game = Game::create([
                'bgg_id' => $obj->bggId,
                'name' => $obj->name,
                'description' => $obj->description,
                'year_published' => $obj->yearPublished,
                'min_players' => $obj->minPlayers,
                'max_players' => $obj->maxPlayers,
                'image_url' => $obj->imageUrl,
                'thumbnail_url' => $obj->imageUrl,
            ]);

            foreach ($obj->categories as $objCat) {

                $category = Category::where('bgg_id', '=', $objCat->bggId)->first();
                if (!$category) {

                    $category = Category::create([
                        'bgg_id' => $objCat->bggId,
                        'name' => $objCat->name
                    ]);

                }
                $game->categories()->attach($category->refresh()->id);
            }

            foreach ($obj->mechanics as $objMech) {

                $mechanic = Mechanic::where('bgg_id', '=', $objMech->bggId)->first();
                if (!$mechanic) {

                    $mechanic = Mechanic::create([
                        'bgg_id' => $objMech->bggId,
                        'name' => $objMech->name
                    ]);

                }
                $game->mechanics()->attach($mechanic->refresh()->id);
            }
        }
    }
}
