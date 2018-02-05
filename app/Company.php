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
}
