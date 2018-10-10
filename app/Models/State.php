<?php

namespace App\Models;

use App\Models\BaseModel;

class State extends BaseModel
{
    protected $fillable = [
        'initials', 'description'
    ];

    public static function listStates()
    {
        return static::orderBy('description')->pluck('description', 'id');
    }

}
