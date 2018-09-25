<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Order;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $this->validate($request, [
            'qty' => 'required|integer',
        ]);

        // Values
        $qty = $request->qty;
        $transaction = $qty * 1000;
        $price = $stock->commodity->prices->last()->price * $qty;
        $now = Carbon::now();
        $date = Carbon::parse($stock->created_at);
        $months = $date->diffInMonths($now);
        if ($months < 1) {
            $storage = 500;
        } else {
            $storage = 500 * $months;
        }
        $charges = ($price + $months + $storage) * 0.025;
        $total = $price - $transaction - $storage - $charges;

        //$order = new Order;

        if ($qty <= $stock->qty) {
            $user = Auth::user();

            $order = $user->orders()->create([

                'transID' => "SL" . getToken(8),
                'type'  => 'sale',
                'total' => $total,

            ]);

            if ($order) {

                $order->stock()->attach($stock->id, [
                    'qty' => $qty, 
                    'transaction_fee' => $transaction, 
                    'charges' => $charges, 
                    'storage_fee' => $storage, 
                    'price' => $stock->commodity->prices->last()->price,
                ]);

                $stock->qty = $stock->qty - $qty;
                $stock->save();
                
            }

            flash()->success('Success!!', 'Your order has been made, and will be process as soon as possible');

        } else {
            flash()->error('Bad Action!!', 'You do not have this much stock to sell.');
        }

        return redirect()->route('user.dashboard');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
