<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommodityPrice extends Model
{
    public function commodity()
    {
    	return $this->belongsTo(Commodity::class, 'commodity_id');
    }
}
