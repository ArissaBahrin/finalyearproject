<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class PackageController extends Controller
{
    public function create()
    {
        return view('Admin.addPackage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string'],
            'itinery' => ['mimes:pdf'],
            'thumbnail' => ['mimes:png,jpeg,jpg']
        ]);

        $package = new Package();
        $package->name = $request->name;
        $package->country = "Asia";
        $package->limit = $request->quantity;
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

        return redirect()->route('admin.package.edit', ['package'=>$package->id])->with('message', 'Created successfully!');
    }

    public function edit(Package $package)
    {
        return view('Admin.editPackage', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $package->name = $request->name;
        // $package->country = $request->country;
        $package->country = "Asia";
        $package->limit = $request->quantity;
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

    public function delete(Package $package)
    {
        $package->delete();

        return redirect()->back()->with('message', "Deleted successfully!");
    }

    public function packageList()
    {
        $packages = Package::all();

        return view('Admin.packageList', compact('packages'));
    }  
}
