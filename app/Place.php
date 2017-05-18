<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function placeTags()
    {
        return $this->hasMany('App\PlaceTag');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
