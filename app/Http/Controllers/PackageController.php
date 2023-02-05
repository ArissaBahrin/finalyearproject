<?php

namespace App\Http\Controllers;

use File;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $packages = Package::inRandomOrder()->limit(3)->get();
        return view('homeV2', compact('packages'));
    }
    public function index()
    {   
        $packages = Package::all();
        foreach($packages as $package) {
            $package["thumbnail"] = "https://source.unsplash.com/500x500/?".$package->country;
            // $package["thumbnail"] = "https://source.unsplash.com/500x500/?scenery";
        }
        return view('Customer.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string'],
            'itinery' => ['mimes:pdf'],
            'thumbnail' => ['mimes:png,jpeg']
        ]);

        // dd($request->all());

        $package = new Package();
        $package->name = $request->name;
        $package->country = "Asia";
        $package->days = $request->days;
        $package->nights = $request->nights;
        $package->adult_price = $request->adult_price;
        $package->children_price = $request->children_price;
        $package->save();

        $itineryPath = $request->file('itinery')->storeAs(
            'itinery',
            $package->id.'.'.$request->file('itinery')->getClientOriginalExtension(),
            'public'
        );

        $thumbnailPath = $request->file('thumbnail')->storeAs(
            'thumbnail',
            $package->id.'.'.$request->file('thumbnail')->getClientOriginalExtension(),
            'public'
        );        

        $package->itinery_path = $itineryPath;
        $package->thumbnail_path = $thumbnailPath;
        $package->save();
        
        return redirect()->route('package.edit', ['package'=>$package->id])->with('message', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('Customer.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('Customer.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $package->name = $request->name;
        // $package->country = $request->country;
        $package->country = "Asia";
        $package->days = $request->days;
        $package->nights = $request->nights;
        $package->adult_price = $request->adult_price;
        $package->children_price = $request->children_price;

        if($request->hasFile('itinery')) {
            if(File::exists(public_path('storage/'.$package->itinery_path))) {
                File::delete(public_path('storage/'.$package->itinery_path));
            }
    
            $itineryPath = $request->file('itinery')->storeAs(
                'itinery',
                $package->id.'.'.$request->file('itinery')->getClientOriginalExtension(),
                'public'
            );
            $package->itinery_path = $itineryPath;
        }

        if($request->hasFile('thumbnail')) {
            if(File::exists(public_path('storage/'.$package->thumbnail_path))) {
                File::delete(public_path('storage/'.$package->thumbnail_path));
            }
    
            $thumbnailPath = $request->file('thumbnail')->storeAs(
                'thumbnail',
                $package->id.'.'.$request->file('thumbnail')->getClientOriginalExtension(),
                'public'
            );
            $package->thumbnail_path = $thumbnailPath;
        }

        $package->save();
        
        return redirect()->back()->with('message', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->back()->with('message', 'Deleted successfully!');
    }

    public function packageList()
    {
        $packages = Package::all();

        return view('Customer.packageList', compact('packages'));
    }
}
