<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function images(){
        return $this->hasMany('App\ServiceImage');
    }

    public function favorites_to_user(){
        return $this->belongsToMany('App\User','favourites');
    }

    public function requests()
    {
        return $this->hasMany('App\ServiceRequest');
    }

    public function features()
    {
        return $this->hasMany('App\HomeFeature');
    }
}
