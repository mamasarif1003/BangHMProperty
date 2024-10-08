<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    protected $guarded = [];
    
    public function product()
    {
    	return $this->hasMany(Product::class);
    }
}
