<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationImage extends Model
{
    protected $fillable = array('image');

    public function company(){
        return $this->belongsTo('App\PopularDestination');
    }
}
