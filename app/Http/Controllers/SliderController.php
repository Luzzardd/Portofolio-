<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('slider.index',compact('slider'));
    }
    public function create()
    {
        return view('slider.create');
    }
    public function store(request $request)
    {
        $imagename = time().'.'.$request->image->extension();

        Storage::putFileAs('public/slider', $request->file('image'), $imagename);

        $slider = Slider::create([
            'title' =>$request->title,
            'caption'=>$request->caption,
            'image'=>$imagename,
        ]);
        return redirect()->route('slider');
    }
    public function edit(Request $request,$id)
    {
        $slider = Slider::find($id);
        return view('slider.edit',compact('slider'));
    }
    public function delete(request $request,$id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('slider');
    }
    public function update(request $request,$id)
    {
        $imagename = time().'.'.$request->image->extension();

        Storage::putFileAs('public/slider', $request->file('image'), $imagename);
        Slider::where('id',$id)->update([
            'title' =>$request->title,
            'caption'=>$request->caption,
            'image'=>$imagename,
        ]);

    }

}
