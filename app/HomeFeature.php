<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeFeature extends Model
{
    protected $fillable = ['feature', 'company_id'];
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
