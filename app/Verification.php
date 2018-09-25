<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $dates = ['dop'];

    public function order() 
    {
    	return $this->belongsTo(Order::class, 'order_id');
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
