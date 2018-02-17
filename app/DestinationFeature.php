<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationFeature extends Model
{
    protected $fillable = ['feature', 'popular_destination_id'];
    public function destination()
    {
        return $this->belongsTo('App\PopularDestination');
    }
}
