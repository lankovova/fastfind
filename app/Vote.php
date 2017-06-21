<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function place()
    {
        return $this->hasOne('App\Place');
    }
}
