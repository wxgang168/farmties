<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Commodity;
use App\Verification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Image;
use Storage;

use App\Events\OrderEvents as NewOrderPlaced;

class OrderController extends Controller
{
    /**
     * [__construct description]
     */
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
        $orders = Order::where('user_id', Auth::user()->id)->where('paid', 0)->latest()->paginate(5);
        return view('pages.dashboard.transactions', compact('orders'));
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
        $user = Auth::user();

        $order = $user->orders()->create([
            'transID' => $request->transID,
            'type'  => 'purchase',
            'total' => Cart::total(null,null,''),
        ]);

        if ($order) {

            $cartItems = Cart::content();

            foreach($cartItems as $cartItem) {
                $price =  ($cartItem->qty*$cartItem->price) + ($cartItem->qty*2000) + (500*$cartItem->qty);
                $total = ($price*0.005) + $price;

                $order->commodities()->attach($cartItem->id, [
                    'qty' => $cartItem->qty,
                    'total' => $total,
                ]);
            }

            Cart::destroy();
            flash()->overlay('Almost Done!!', 'Please check your email for the account details to make payment, in order to complete the transaction.');

        }

        // Event is fired here
        event(new NewOrderPlaced($order));
        
        return redirect()->route('user.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($order)
    {
        $order = Order::where('transID', $order)->firstOrFail();
        return view('pages.dashboard.verify', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order)
    {
        $order = Order::where('transID', $order)->firstOrFail();
        //$user = Auth::user();

        $order->processing = 1;

        if($order->save()) {
            
            $this->validate($request, [
                'bank' => 'required',
                'teller_no' => 'required',
                'dop' => 'required',
                'depositor' => 'required',
            ]);

            $verify = new Verification;

            $verify->order_id = $order->id;
            $verify->user_id = Auth::user()->id;
            $verify->bank = $request->bank;
            $verify->teller_no = $request->teller_no;
            $verify->dop = $request->dop;
            $verify->depositor = $request->depositor;

            if ($request->hasFile('path')) {
                $file = $request->file('path');
                $filename = time() . $file->getClientOriginalName();
                $location = public_path('images/payments/' . $filename);
                Image::make($file)->fit(1920, 1080)->save($location);

                $verify->path = $filename;
            }

            $verify->save();
        }

        flash()->success('Almost Done!!', 'We would verify payment and get back to you as soon as possible.');

        return redirect()->route('orders.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
