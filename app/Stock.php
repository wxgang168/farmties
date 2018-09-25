<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = ['user_id', 'commodity_id', 'qty', 'duration', 'price', 'total'];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function commodity()
    {
    	return $this->belongsTo(Commodity::class, 'commodity_id');
    }

    public function order()
    {
    	return $this->belongsTo(Order::class, 'order_id');
    }
}
