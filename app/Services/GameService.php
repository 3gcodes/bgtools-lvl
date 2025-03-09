<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface GameService
{
    public function findAll(): ResourceCollection;
}
