<?php

namespace App\Services\Impl;

use App\Models\Game;
use App\Models\Player;
use App\Services\PlayerService;

class PlayerServiceImpl implements PlayerService
{

    public function addToCollection(string $gameId, string $playerId)
    {
        $game = Game::find($gameId);
        $player = Player::find($playerId);

        if (!$game || !$player) {
            return false;
        }

        $player->owns()->attach($gameId);
    }
}
