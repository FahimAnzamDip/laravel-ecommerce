<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    //Show All Categories
    public function index() {
        $title = 'Dashboard - Category';
        $categories = Category::all();

        return view('admin.pages.category.categories.index', compact('categories', 'title') );
    }

    //Store or Create Category
    public function store(Request $request) {
        $request->validate([
            'category_name' => 'required|unique:categories|max:191',
            'category_image.*' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        $uploaded_img = $request->file('category_image');
        $img_name= 'category_' . $category_id . '.' . $uploaded_img->getClientOriginalExtension();
        $img_location = public_path('uploads/category_images/' . $img_name);

        Image::make($uploaded_img)->resize(770, 400)->save($img_location);

        Category::find($category_id)->update([
            'category_image' => $img_name
        ]);
        toast('Category Added Successfully!', 'success');

        return redirect()->route('category.index');
    }

    //Show The Category Edit Page
    public function edit($id) {
        $title = 'Dashboard - Edit Category';
        $category = Category::find($id);

        return view('admin.pages.category.categories.edit', compact('category', 'title'));
    }

    //Update The Category
    public function update(Request $request, $id) {
        $request->validate([
            'category_name' => 'required|max:191',
            'category_image.*' => 'image|mimes:jpeg,jpg,png'
        ]);

        if ($request->hasFile('category_image')) {
            unlink(public_path('uploads/brand_logos/' . Category::find($id)->category_image));

            $uploaded_img = $request->file('category_image');
            $img_name= 'category_' . $id . '.' . $uploaded_img->getClientOriginalExtension();
            $img_location = public_path('uploads/category_images/' . $img_name);

            Image::make($uploaded_img)->resize(770, 400)->save($img_location);

            Category::find($id)->update([
                'category_name' => $request->category_name,
                'category_image' => $img_name
            ]);
            toast('Category Updated Successfully!', 'success');
        } else {
            Category::find($id)->update([
                'category_name' => $request->category_name
            ]);
            toast('Category Name Updated Successfully!', 'success');
        }

        return redirect()->route('category.index');
    }

    //Delete The Category
    public function delete($id) {
        $category = Category::find($id);
        unlink(public_path('uploads/category_images/' . $category->category_image));
        $category->delete();

        toast('Category Deleted Successfully!', 'warning');

        return redirect()->route('category.index');
    }

}
