<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['transID', 'total', 'paid', 'type', 'processing'];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

	public function commodities()
    {
    	return $this->belongsToMany(Commodity::class)->withPivot('qty', 'duration', 'total');
    }

    public function stock()
    {
        return $this->belongsToMany(Stock::class)->withPivot('qty', 'transaction_fee', 'charges', 'storage_fee', 'price');
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * transaction verification for order.
     * @return [type] [description]
     */
    public function verification()
    {
    	return $this->hasOne(Verification::class);
    }
    
}
