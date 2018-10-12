<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
	protected $fillable = ['region', 'abb', 'archived'];
    public function abbreviations()
    {
    	return $this->hasMany(Abbreviation::class);
    }
}
