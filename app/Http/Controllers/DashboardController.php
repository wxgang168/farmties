<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Commodity;
use App\Stock;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('pages.dashboard.index');
    }

    public function display(Request $request)
    {
    	if ($request->ajax()) {

            if ($request->commodity_id !== null) {
            	$id = $request->commodity_id;
                $commodity = Commodity::find($id);
                $data = view('pages.ajaxs.commodity', compact('commodity'))->render();
                
            }

            return response()->json($data);

        }
    }

    public function sale(Request $request)
    {
        if ($request->ajax()) {

            if ($request->stock_id !== null) {
                $id = $request->stock_id;
                $stock = Stock::find($id);
                $data = view('pages.ajaxs.stocks', compact('stock'))->render();
                
            }

            return response()->json($data);

        }
    }

    public function calculateSale(Request $request)
    {
        if ($request->ajax()) {
            // validate ajax request
            $this->validate($request, [

                'stock' => 'required|integer',
                'qty' => 'required|integer',

            ]);

            if ($request->stock !== null) {
                $id = $request->stock;
                $stock = Stock::find($id);

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

                return response()->json(['data' => [$total, $transaction, $charges, $price, $storage]]);
            }
        }
    }

    public function stocks()
    {
        $stocks = Stock::where('user_id', Auth::user()->id)->latest()->get();
        return view('pages.dashboard.stocks', compact('stocks'));
    }
}
