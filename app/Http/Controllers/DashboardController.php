<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $sliders= Slider::all();
        $products= Product::all();
        $category = Category::all();
        $auth=Auth::user()->role->name;

    if ($request->category) {
            $products = Product::with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            })->get();
    }else if ($request->min && $request->max) {
        $products = Product::where('price', '>=', $request->min)->where('price', '<=', $request->max)->get();
    }


        if(
            $auth=='User'
        ){
            return view('user.landing',compact('sliders','products','category'));
        }else{
            return view('dashboard');
        }




    }
}
