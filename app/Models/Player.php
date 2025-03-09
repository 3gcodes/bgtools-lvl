<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends ModelBase
{
    protected $fillable = [
        'bgg_username',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function owns(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'players_games');
    }
}
