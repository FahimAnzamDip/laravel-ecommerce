<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {
        $title = 'Dashboard - Slider';
        $sliders = Slider::latest()->get();

        return view('admin.pages.slider.index', compact('title', 'sliders'));
    }

    public function store(Request $request) {
        $request->validate([
            'slider_image.*' => 'required|image|mimes:jpeg,jpg,png',
            'link' => 'required'
        ]);

        $slider_id = Slider::insertGetId([
            'link' => $request->link,
            'created_at' => Carbon::now()
        ]);

        $uploaded_img = $request->file('slider_image');
        $img_name= 'slide_' . $slider_id . '.' . $uploaded_img->getClientOriginalExtension();
        $img_location = public_path('uploads/slider_images/' . $img_name);

        Image::make($uploaded_img)->save($img_location);

        Slider::find($slider_id)->update([
            'slider_image' => $img_name
        ]);
        toast('Slide Created Successfully!', 'success');

        return redirect()->route('slider.index');
    }

    public function edit($id) {
        $title = 'Dashboard - Edit Slider';
        $slider = Slider::find($id);

        return view('admin.pages.slider.edit', compact('title', 'slider'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'slider_image' => 'image|mimes:jpg,jpeg,png',
            'link' => 'required'
        ]);

        $slider = Slider::find($id);

        if ($request->hasFile('slider_image')) {
            unlink(public_path('uploads/slider_images/' . $slider->slider_image));

            $uploaded_img = $request->file('slider_image');
            $img_name= 'slide_' . $slider->id . '.' . $uploaded_img->getClientOriginalExtension();
            $img_location = public_path('uploads/slider_images/' . $img_name);

            Image::make($uploaded_img)->save($img_location);

            $slider->update([
                'slider_image' => $img_name
            ]);
        }

        $slider->update([
            'link' => $request->link
        ]);
        toast('Slide Updated Successfully!', 'success');

        return redirect()->route('slider.index');
    }

    public function delete($id) {
        $slider = Slider::find($id);

        $img_location = public_path('uploads/slider_images/' . $slider->slider_image);
        unlink($img_location);

        $slider->delete();
        toast('Slide Deleted Successfully!', 'warning');

        return redirect()->route('slider.index');
    }
}
