<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function wishlists(){
        return $this->belongsTo(wishlists::class);
    }
}
