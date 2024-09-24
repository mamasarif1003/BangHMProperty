<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Product extends Model
{
    //
    protected $guarded = [];
    
    public function place()
    {
    	return $this->belongsTo(Place::class);
    }
    
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }
    
    public function wishlist()
    {
    	return $this->HasMany(Wishlist::class);
    }
}
