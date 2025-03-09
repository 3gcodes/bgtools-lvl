<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PlayerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PlayerController extends Controller
{
    public function addToCollection(Request $request)
    {
        $request->validate([
            'game_id' => 'required|string'
        ]);

        $playerService = App::make(PlayerService::class);
        $user = $request->user();

        $playerService->addToCollection($request->game_id, $user->player()->first()->id);

        return response(status: 201);
    }
}
