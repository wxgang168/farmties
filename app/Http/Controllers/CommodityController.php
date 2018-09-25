<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\CommodityPrice;
use Illuminate\Http\Request;

use Image;
use Storage;

class CommodityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodities = Commodity::latest()->get();
        return view('admin.commodities.index', compact('commodities'));
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
        $this->validate($request, [

            'name' => 'required',
            'path' => 'required',
            'price' => 'required',

        ]);

        $commodity = new Commodity;

        $commodity->name = $request->name;
        $commodity->slug = slugify($request->name);
        $commodity->comID = "FRM" . getToken(4);

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/commodities/' . $filename);
            Image::make($file)->fit(1200, 1486)->save($location);

            $commodity->path = $filename;
        }

        if ($commodity->save()) {
            $priceTag = new CommodityPrice;

            $priceTag->commodity_id = $commodity->id;
            $priceTag->price = $request->price;

            $priceTag->save();
        }

        flash()->success('Success!!', 'Commodity added successfully.');
        return redirect()->route('commodities.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(Commodity $commodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(Commodity $commodity)
    {
        return view('admin.commodities.edit', compact('commodity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commodity $commodity)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $commodity->name = $request->name;
        $commodity->slug = slugify($request->name);

        if ($commodity->save()) {
            $priceTag = new CommodityPrice;

            $priceTag->commodity_id = $commodity->id;
            $priceTag->price = $request->price;

            $priceTag->save();
        }

        flash()->success('Success!!', 'Commodity added successfully.');
        return redirect()->route('commodities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodity $commodity)
    {
        //
    }
}
