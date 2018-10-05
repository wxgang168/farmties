<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Commodity;
use App\Stock;
use App\UserProfile;
use Auth;
use Carbon\Carbon;

use Image;
use Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$orders = Order::where('user_id', Auth::user()->id)
                       ->where('paid', 1)
                       ->latest()
                       ->take(5)
                       ->get();
        return view('pages.dashboard.index', compact('orders'));
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

    public function profile()
    {
        if (Auth::user()->profile->path !== null) {
            return view('pages.dashboard.patch');
        } else {
            return view('pages.dashboard.profile');
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
                $store = 500 * $qty;

                $price = $stock->commodity->prices->last()->price * $qty;

                $now = Carbon::now();
                $date = Carbon::parse($stock->created_at);

                $months = $date->diffInMonths($now);

                if ($months < 1) {
                    $storage = $store;
                } else {
                    $storage = $store * $months;
                }

                
                $charges = ($price + $months + $storage) * 0.025;
                
                $total = $price - $transaction - $storage - $charges;

                return response()->json(['data' => [$total, $transaction, $charges, $price, $storage]]);
            }
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'bank' => 'required',
            'account_no' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'identity' => 'required',
        ]);

        $profile = new UserProfile;
        $user = Auth::user();

        $profile->bank = $request->bank;
        $profile->account_no = $request->account_no;
        $profile->address = $request->address;
        $profile->office = $request->office;
        $profile->mobile = $request->mobile;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/avatar/' . $filename);
            Image::make($file)->fit(114, 113)->save($location);

            $profile->path = $filename;
        }

        if ($request->hasFile('identity')) {
            $file = $request->file('identity');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/identity/' . $filename);
            Image::make($file)->fit(600, 480)->save($location);

            $profile->identity = $filename;
        }

        // $profile->user()->associate($user);
        // $profile->save();

        $user->profile()->save($profile);

        flash()->success('Success!!!', 'Your Profile has been updated successfully');
        return redirect()->route('user.dashboard');
    }

    public function patchProfile(Request $request, UserProfile $profile)
    {
        $this->validate($request, [
            'bank' => 'required',
            'account_no' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        $profile->bank = $request->bank;
        $profile->account_no = $request->account_no;
        $profile->address = $request->address;
        $profile->office = $request->office;
        $profile->mobile = $request->mobile;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/avatar/' . $filename);
            Image::make($file)->fit(114, 113)->save($location);

            $profile->path = $filename;
        }

        if ($request->hasFile('identity')) {
            $file = $request->file('identity');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/identity/' . $filename);
            Image::make($file)->fit(600, 480)->save($location);

            $profile->identity = $filename;
        }

        // $profile->user()->associate($user);
        $profile->save();

        //$user->profile()->save($profile);

        flash()->success('Success!!!', 'Your Profile Details have been updated successfully');
        return redirect()->route('user.dashboard');
    }

    public function stocks()
    {
        $stocks = Stock::where('user_id', Auth::user()->id)
                       ->where('qty', '>', 0)
                       ->latest()
                       ->get();
        return view('pages.dashboard.stocks', compact('stocks'));
    }
}
