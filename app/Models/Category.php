<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends ModelBase
{

    use HasFactory;

    protected $fillable = [
        'bgg_id',
        'name',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'games_categories');
    }
}
