<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function placeTag()
    {
        return $this->hasMany('App\Tag');
    }
}
