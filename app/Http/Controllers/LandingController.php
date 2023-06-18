<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $sliders= Slider::all();
        $products= Product::limit(8)->get();
        $category = Category::all();

    if ($request->category) {
            $products = Product::with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            })->limit(8)->get();
    }else if ($request->min && $request->max) {
        $products = Product::where('price', '>=', $request->min)->where('price', '<=', $request->max)->get();
    }
    return view('landing',compact('sliders','products','category',));

    }

}

