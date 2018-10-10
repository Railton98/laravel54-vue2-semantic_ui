<?php

namespace App\Models;

use App\Models\BaseModel;

class Country extends BaseModel
{
    protected $fillable = [
        'description'
    ];

    public static function listCountries()
    {
        return static::orderBy('description')->pluck('description', 'id');
    }

}
