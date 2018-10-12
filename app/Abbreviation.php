<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abbreviation extends Model
{
	protected $fillable = ['region_id', 'commodity_id', 'MaxP', 'MinP', 'AveP', 'CHG', 'archived'];
	
    public function region()
    {
    	return $this->belongsTo(Region::class, 'region_id');
    }

    public function commodity()
    {
    	return $this->belongsTo(Commodity::class, 'commodity_id');
    }
}
