<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    //Show All Sub Category
    public function index() {
        $title = 'Dashboard - Sub Category';
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();

        return view('admin.pages.category.subcategories.index', compact('title', 'subcategories', 'categories'));
    }

    //Store or Create Sub Category
    public function store(Request $request) {
        $request->validate([
            'sub_category_name' => 'required|unique:sub_categories|max:255',
            'category_name' => 'required'
        ]);

        SubCategory::create([
            'sub_category_name' => $request->sub_category_name,
            'category_id' => $request->category_name,
            'created_at' => Carbon::now()
        ]);
        toast('Sub Category Created Successfully!', 'success');

        return redirect()->route('subcategory.index');
    }

    //Show The Sub Category Edit Page
    public function edit($id) {
        $title = 'Dashboard - Edit Sub Category';
        $categories = Category::latest()->get();
        $subcategory = SubCategory::find($id);

        return view('admin.pages.category.subcategories.edit', compact('title', 'categories', 'subcategory'));
    }

    //Update The Sub Category
    public function update(Request $request, $id) {
        $request->validate([
            'sub_category_name' => 'required|max:255',
            'category_name' => 'required'
        ]);

        SubCategory::find($id)->update([
            'sub_category_name' => $request->sub_category_name,
            'category_id' => $request->category_name
        ]);
        toast('Sub Category Updated Successfully!', 'success');

        return redirect()->route('subcategory.index');
    }

    //Delete The Sub Category
    public function delete($id) {
        SubCategory::find($id)->delete();
        toast('Sub Category Deleted Successfully!', 'warning');

        return redirect()->route('subcategory.index');
    }
}
