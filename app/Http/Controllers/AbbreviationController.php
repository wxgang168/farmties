<?php

namespace App\Http\Controllers;

use App\Abbreviation;
use App\Commodity;
use App\Region;
use Illuminate\Http\Request;

class AbbreviationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abbreviations = Abbreviation::latest()->get();
        return view('admin.abbreviations.index', compact('abbreviations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::latest()->get();
        $commodities = Commodity::latest()->get();
        return view('admin.abbreviations.create', compact('regions', 'commodities'));
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
            'region_id' => 'required|integer',
            'commodity_id' => 'required|integer',
            'MaxP' => 'required',
            'MinP' => 'required',
            'AveP' => 'required',
            'CHG' => 'required',
        ]);

        $abbreviation = Abbreviation::create([

            'region_id' => $request->region_id,
            'commodity_id' => $request->commodity_id,
            'MaxP' => $request->MaxP,
            'MinP' => $request->MinP,
            'AveP' => $request->AveP,
            'CHG' => $request->CHG,

        ]);

        flash()->success('Success!!', 'Abbreviations created successfully.');
        return redirect()->route('abbreviations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abbreviation  $abbreviation
     * @return \Illuminate\Http\Response
     */
    public function show(Abbreviation $abbreviation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abbreviation  $abbreviation
     * @return \Illuminate\Http\Response
     */
    public function edit(Abbreviation $abbreviation)
    {
        $regions = Region::latest()->get();
        $commodities = Commodity::latest()->get();
        return view('admin.abbreviations.edit', compact('regions', 'commodities', 'abbreviation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abbreviation  $abbreviation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abbreviation $abbreviation)
    {
        $this->validate($request, [
            'region_id' => 'required|integer',
            'commodity_id' => 'required|integer',
            'MaxP' => 'required',
            'MinP' => 'required',
            'AveP' => 'required',
            'CHG' => 'required',
        ]);

        $abbreviation->region_id = $request->region_id;
        $abbreviation->commodity_id = $request->commodity_id;
        $abbreviation->MaxP = $request->MaxP;
        $abbreviation->MinP = $request->MinP;
        $abbreviation->AveP = $request->AveP;
        $abbreviation->CHG = $request->CHG;

        $abbreviation->save();

        flash()->success('Success!!', 'Abbreviation has been updated successfully.');
        return redirect()->route('abbreviations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abbreviation  $abbreviation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abbreviation $abbreviation)
    {
        //
    }
}
