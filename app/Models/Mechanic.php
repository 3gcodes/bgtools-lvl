<?php

namespace App\Models;

class Mechanic extends ModelBase
{
    protected $fillable = [
        'bgg_id',
        'name',
    ];

    protected $hidden = [
        'pivot'
    ];
    //
}
