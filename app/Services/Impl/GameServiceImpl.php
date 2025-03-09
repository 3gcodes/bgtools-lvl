<?php

namespace App\Services\Impl;

use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GameServiceImpl implements GameService
{

    public function findAll(): ResourceCollection
    {
        return GameResource::collection(
            Game::latest()->with(['categories', 'mechanics'])->paginate()
        );
    }
}
