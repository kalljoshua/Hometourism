<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopularDestination extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images(){
        return $this->hasMany('App\DestinationImage');
    }

    public function features()
    {
        return $this->hasMany('App\DestinationFeature');
    }
}
