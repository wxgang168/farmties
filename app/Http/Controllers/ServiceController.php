<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

use Image;
use Storage;

class ServiceController extends Controller
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
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'description' => 'required',
        ]);

        $service = new Service;

        $service->name = $request->name;
        $service->slug = slugify($request->name);
        $service->description = $request->description;
        $service->body = $request->body;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/services/' . $filename);
            Image::make($file)->fit(1920, 1080)->save($location);

            $service->path = $filename;
        }

        $service->save();
        flash()->success('Congratulations!!', 'You have successfully created a new service.');
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($service)
    {
        $service = Service::where('slug', $service)->firstOrFail();
        return view('pages.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $service->name = $request->name;
        $service->slug = slugify($request->name);
        $service->description = $request->description;
        $service->body = $request->body;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/services/' . $filename);
            Image::make($file)->fit(1920, 1080)->save($location);

            $service->path = $filename;
        }

        $service->save();

        flash()->success('Congratulations!!', 'Service has been updated successfully');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
