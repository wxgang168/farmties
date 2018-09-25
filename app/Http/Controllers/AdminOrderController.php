<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AdminOrderController extends Controller
{
	/**
     * [__construct description]
     */
    public function __construct()
	{
		$this->middleware('auth:admin');
	}

    public function index()
    {
    	$orders = Order::where('processing', 1)->latest()->get();
    	return view('admin.orders.index', compact('orders'));
    }

    public function edit($order)
    {
    	$order = Order::where('transID', $order)->firstOrFail();
    	return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        //dd($request->all());
        $order->paid = 1;
        $order->processing = 0;
        $order->save();

        $commodities = $order->commodities;

        foreach ($commodities as $commodity) {
            $order->stocks()->create([
                'user_id' => $order->user_id,
                'commodity_id' => $commodity['id'],
                'qty' => $commodity['pivot']['qty'],
                'price' => ($commodity['pivot']['total'] / $commodity['pivot']['qty']),
                'total' => $commodity['pivot']['total'],
            ]);
        }

        flash()->success('All Done!!', 'Payment successfully verified.');
        return redirect()->route('admin.orders.index');
    }
}
