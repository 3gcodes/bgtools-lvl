<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends ModelBase
{
    use HasFactory;

    protected $fillable = [
        'bgg_id',
        'name',
        'description',
        'year_published',
        'min_players',
        'max_players',
        'image_url',
        'thumbnail_url'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'games_categories');
    }

    public function mechanics(): BelongsToMany
    {
        return $this->belongsToMany(Mechanic::class, 'games_mechanics');
    }

    public function ownedBy(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'players_games');
    }

}
