<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function companies()
    {
        return $this->hasMany('App\Company');
    }
}
