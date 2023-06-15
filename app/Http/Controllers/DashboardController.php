<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $sliders= Slider::all();
        $products= Product::all();
        $category = Category::all();
        $auth=Auth::user()->role->name;
        if(
            $auth=='User'
        ){
            return view('user.landing',compact('sliders','products','category'));
        }else{
            return view('dashboard');
        }




    }
}
