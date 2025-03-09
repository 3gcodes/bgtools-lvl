<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GameController extends Controller
{
    public function index()
    {
        $gameService = App::make(GameService::class);
        return $gameService->findAll();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Game $game)
    {
        return new GameResource($game);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
