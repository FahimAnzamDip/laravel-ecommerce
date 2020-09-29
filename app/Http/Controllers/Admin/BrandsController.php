<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    //Show All Brands
    public function index() {
        $title = 'Dashboard - Brand';
        $brands = Brand::latest()->get();

        return view('admin.pages.category.brands.index', compact('brands', 'title'));
    }

    //Store or Create Brand
    public function store(Request $request) {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_logo.*' => 'required|image|mimes:jpg, jpeg, png'
        ]);

        $brand_id = Brand::insertGetId([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now()
        ]);

        $uploaded_img = $request->file('brand_logo');
        $img_name= 'brand_' . $brand_id . '.' . $uploaded_img->getClientOriginalExtension();
        $img_location = public_path('uploads/brand_logos/' . $img_name);

        Image::make($uploaded_img)->save($img_location);

        Brand::find($brand_id)->update([
            'brand_logo' => $img_name
        ]);
        toast('Brand Created Successfully!', 'success');

        return redirect()->route('brand.index');
    }

    //Show The Brand Edit Page
    public function edit($id) {
        $title = 'Dashboard - Edit Brand';
        $brand = Brand::find($id);

        return view('admin.pages.category.brands.edit', compact('brand', 'title'));
    }

    //Update The Brand
    public function update(Request $request, $id) {
        $request->validate([
            'brand_name' => 'required|max:255',
            'brand_logo.*' => 'nullable|image|mimes:jpg, jpeg, png'
        ]);

        if ($request->hasFile('brand_logo')) {
            unlink(public_path('uploads/brand_logos/' . Brand::find($id)->brand_logo));

            $uploaded_img = $request->file('brand_logo');
            $img_name= 'brand_' . $id . '.' . $uploaded_img->getClientOriginalExtension();
            $img_location = public_path('uploads/brand_logos/' . $img_name);

            Image::make($uploaded_img)->save($img_location);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_logo' => $img_name
            ]);
            toast('Brand Updated Successfully!', 'success');
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name
            ]);
            toast('Brand Name Updated Successfully!', 'success');
        }

        return redirect()->route('brand.index');
    }

    //Delete The Brand
    public function delete($id) {
        $brand = Brand::find($id);

        $img_location = public_path('uploads/brand_logos/' . $brand->brand_logo);
        unlink($img_location);

        $brand->delete();
        toast('Brand Deleted Successfully!', 'warning');

        return redirect()->route('brand.index');
    }

}
