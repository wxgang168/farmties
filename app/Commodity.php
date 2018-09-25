<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    public function prices()
    {
    	return $this->hasMany(CommodityPrice::class);
    }
}
