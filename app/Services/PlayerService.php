<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Player;

interface PlayerService
{
    public function addToCollection(string $gameId, string $playerId);
}
