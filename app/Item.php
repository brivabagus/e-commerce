<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $guarded = [];

    public function orders(){
        return $this->belongsToMany('App\User', 'orders', 'item_id', 'user_id')->withPivot('quantity');
    }
    
    public function wishlist(){
        return $this->belongsToMany('App\User', 'wishlist', 'item_id', 'user_id');
    }
}
