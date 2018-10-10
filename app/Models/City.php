<?php

namespace App\Models;

use App\Models\BaseModel;

class City extends BaseModel
{
    protected $fillable = [
        'name', 'uf', 'state_id'
    ];

    public static function listCities($state_id)
    {
        return static::orderBy('name')->where('state_id', '=', $state_id)->pluck('name', 'id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

}
