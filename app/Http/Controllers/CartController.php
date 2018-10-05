<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commodity;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
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
        //dd(Cart::content());
        $cartItems = Cart::content();
        return view('pages.dashboard.cart', compact('cartItems'));
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
        if ($request->ajax()) {

            $this->validate($request, [
                'qty' => 'required|integer',
            ]);

            $id = $request->comid;
            $qty = $request->qty;

            $commodity = Commodity::find($id);
            $handling = 1000 * $qty; 
            $transaction = 1000 * $qty;
            $storage = 500 * $qty;

            Cart::add($commodity->id, $commodity->name, $qty, $commodity->prices->last()->price, ['image' => $commodity->path, 'handling' => $handling, 'transaction' => $transaction, 'storage' => $storage])->associate('Commodity');

            return response()->json(['data' => 'Cart updated successfully', 'status' => 'success']);

        }
    }

    public function updateValues(Request $request)
    {
        if ($request->ajax()) {
            // validate ajax request
            $this->validate($request, [

                'comm_id' => 'required|integer',
                'qty' => 'required|integer',

            ]);

            if ($request->comm_id !== null) {
                $id = $request->comm_id;
                $commodity = Commodity::find($id);
                $qty = $request->qty;
                $handling = $qty * 1000;
                $storage = 500 * $qty;
                $transaction = $qty * 1000;
                $price = $commodity->prices->last()->price * $qty;
                $sub = $handling + $price + $transaction + $storage;
                $charges = $sub * 0.005;
                $total = $sub + $charges;

                return response()->json(['data' => [$handling, $total, $transaction, $charges, $price, $storage]]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function removeRow(Request $request)
    {
        if ($request->ajax()) {
            
            if ($request->commodity !== null) {

                $rowId = $request->commodity;
                Cart::remove($rowId);

                return response()->json(['data' => 'Cart updated successfully', 'status' => 'success']);
               
            }

        }

        return response()->json(['data' => 'Failed updating cart']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
