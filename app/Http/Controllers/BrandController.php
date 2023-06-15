<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index',compact('brands'));

    }
    public function store(request $request)
    {
        $brand= Brand::create([
            'name' => $request->name,

        ]);
        return redirect()->route('brand');
    }
    public function create()
    {
        return view('brand.create');
    }
    public function edit(request $request,$id)
    {
        $brand = Brand::find($id);
        return view('brand.edit',compact('brand'));
    }
    public function update(request $request,$id)
    {
        Brand::where('id',$id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('brand');
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand');
    }

}
