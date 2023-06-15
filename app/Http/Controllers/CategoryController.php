<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index',compact('category'));
    }
    public function create(request $request)
    {
        return view('category.create');
    }
    public function store(request $request)
    {

        $category = Category::create([
            'name' =>$request->name,
        ]);
        return redirect()->route('category');
    }
    public function edit(Request $request,$id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }
    public function delete(request $request,$id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('slider');
    }
    public function update(request $request,$id)
    {

        Category::where('id',$id)->update([
            'name'=>$request->name,
        ]);

    }

}
