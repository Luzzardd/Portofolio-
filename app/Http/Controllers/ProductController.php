<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();
        return view('product.index',compact('product'));

    }

    public function show($id)
    {
        $product = Product::where('id', $id)->with('category')->first();

        $related = Product::where('category_id', $product->category->id)->where('id','!=',$id)->inRandomOrder()->limit(4)->get();

        if ($product) {
            return view('product.show', compact('product', 'related'));
        } else {
            abort(404);
        }

    }
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('product.create',compact('category','brand'));
    }
    public function store(request $request)
    {
        $imagename = time().'.'.$request->image->extension();

        Storage::putFileAs('public/product ', $request->image, $imagename);
        $product = Product::create([
            'category_id' =>$request->category,
            'name'=>$request->name,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'brands'=>$request->brand,
            'image'=>$imagename,
            'rating'=>'5',
            'description'=>$request->description,

        ]);
        return redirect()->route('product');
    }
    public function edit(request $request,$id)
    {
        $product = Product::where('id',$id)->with('category')->first();
        $brand = Brand::all();
        $category = Category::all();
        return view('product.edit',compact('product', 'brand', 'category'));
    }
    public function delete(request $request,$id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product');
    }
    public function update(request $request,$id)
    {
        if ($request->hasFile('image')) {
        $old_image = Product::find($id)->image;

            Storage::delete('public/product/'.$old_image);
        $imagename = time().'.'.$request->image->extension();
        Storage::putFileAs('public/product ', $request->file('image'), $imagename);
        $product = Product::where('id',$id)->update([
            'category_id' =>$request->category,
            'name'=>$request->name,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'brands'=>$request->brand,
            'image'=>$imagename,
            'description'=>$request->description,
            'rating'=>'5',


        ]);
    }else{
        $product = Product::where('id',$id)->update([
            'category_id' =>$request->category,
            'name'=>$request->name,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'brands'=>$request->brand,
            'description'=>$request->description,
            'rating'=>'5', ]);

    }   return redirect()->route('product');
}


}
