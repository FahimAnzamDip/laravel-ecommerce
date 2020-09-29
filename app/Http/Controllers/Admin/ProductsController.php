<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    //Show All Products
    public function index() {
        $products = Product::latest()->get();

        return view('admin.pages.product.index', compact('products'));
    }

    //Show Create Product
    public function create() {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.pages.product.create', compact('categories', 'brands'));
    }

    //Store Product
    public function store(Request $request) {
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required|numeric',
            'product_details' => 'required',
            'selling_price' => 'required',
            'image_one.*' => 'required|image|mimes:jpg, jpeg, png',
            'image_two.*' => 'required|image|mimes:jpg, jpeg, png',
            'image_three.*' => 'required|image|mimes:jpg, jpeg, png'
        ]);

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'product_details' => $request->product_details,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,
            'selling_price' => $request->selling_price,
            'discounted_price' => $request->discounted_price,
            'hot_deal' => $request->hot_deal,
            'best_rated' => $request->best_rated,
            'hot_new' => $request->hot_new,
            'trend' => $request->trend,
            'video_link' => $request->video_link,
            'created_at' => Carbon::now()
        ]);

        $uploaded_img_one = $request->file('image_one');
        $img_name_one = 'product_one_' . $product_id . '.' . $uploaded_img_one->getClientOriginalExtension();
        $img_location_one = public_path('uploads/product_images/' . $img_name_one);
        Image::make($uploaded_img_one)->save($img_location_one);

        $uploaded_img_two = $request->file('image_two');
        $img_name_two = 'product_two_' . $product_id . '.' . $uploaded_img_two->getClientOriginalExtension();
        $img_location_two = public_path('uploads/product_images/' . $img_name_two);
        Image::make($uploaded_img_two)->save($img_location_two);

        $uploaded_img_three = $request->file('image_three');
        $img_name_three = 'product_three_' . $product_id . '.' . $uploaded_img_three->getClientOriginalExtension();
        $img_location_three = public_path('uploads/product_images/' . $img_name_three);
        Image::make($uploaded_img_three)->save($img_location_three);

        Product::find($product_id)->update([
            'image_one' => $img_name_one,
            'image_two' => $img_name_two,
            'image_three' => $img_name_three
        ]);
        toast('Product Added Successfully', 'success');

        return redirect()->route('product.index');
    }

    //Show Edit Product
    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.pages.product.edit', compact('product', 'categories', 'brands'));
    }

    //Update Product
    public function update(Request $request, $id) {
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required|numeric',
            'product_details' => 'required',
            'selling_price' => 'required',
            'image_one.*' => 'image|mimes:jpg, jpeg, png',
            'image_two.*' => 'image|mimes:jpg, jpeg, png',
            'image_three.*' => 'image|mimes:jpg, jpeg, png'
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image_one') && $request->hasFile('image_two') && $request->hasFile('image_three')) {
            unlink(public_path('uploads/product_images/' . $product->image_one));
            unlink(public_path('uploads/product_images/' . $product->image_two));
            unlink(public_path('uploads/product_images/' . $product->image_three));

            $uploaded_img_one = $request->file('image_one');
            $img_name_one = 'product_one_' . $product->id . '.' . $uploaded_img_one->getClientOriginalExtension();
            $img_location_one = public_path('uploads/product_images/' . $img_name_one);
            Image::make($uploaded_img_one)->save($img_location_one);

            $uploaded_img_two = $request->file('image_two');
            $img_name_two = 'product_two_' . $product->id . '.' . $uploaded_img_two->getClientOriginalExtension();
            $img_location_two = public_path('uploads/product_images/' . $img_name_two);
            Image::make($uploaded_img_two)->save($img_location_two);

            $uploaded_img_three = $request->file('image_three');
            $img_name_three = 'product_three_' . $product->id . '.' . $uploaded_img_three->getClientOriginalExtension();
            $img_location_three = public_path('uploads/product_images/' . $img_name_three);
            Image::make($uploaded_img_three)->save($img_location_three);

            $product->update([
                'image_one' => $img_name_one,
                'image_two' => $img_name_two,
                'image_three' => $img_name_three
            ]);
        } else if ($request->hasFile('image_one') && $request->hasFile('image_two')) {
            unlink(public_path('uploads/product_images/' . $product->image_one));
            unlink(public_path('uploads/product_images/' . $product->image_two));

            $uploaded_img_one = $request->file('image_one');
            $img_name_one = 'product_one_' . $product->id . '.' . $uploaded_img_one->getClientOriginalExtension();
            $img_location_one = public_path('uploads/product_images/' . $img_name_one);
            Image::make($uploaded_img_one)->save($img_location_one);

            $uploaded_img_two = $request->file('image_two');
            $img_name_two = 'product_two_' . $product->id . '.' . $uploaded_img_two->getClientOriginalExtension();
            $img_location_two = public_path('uploads/product_images/' . $img_name_two);
            Image::make($uploaded_img_two)->save($img_location_two);

            $product->update([
                'image_one' => $img_name_one,
                'image_two' => $img_name_two
            ]);
        } else if ($request->hasFile('image_one') && $request->hasFile('image_three')) {
            unlink(public_path('uploads/product_images/' . $product->image_one));
            unlink(public_path('uploads/product_images/' . $product->image_three));

            $uploaded_img_one = $request->file('image_one');
            $img_name_one = 'product_one_' . $product->id . '.' . $uploaded_img_one->getClientOriginalExtension();
            $img_location_one = public_path('uploads/product_images/' . $img_name_one);
            Image::make($uploaded_img_one)->save($img_location_one);

            $uploaded_img_three = $request->file('image_three');
            $img_name_three = 'product_three_' . $product->id . '.' . $uploaded_img_three->getClientOriginalExtension();
            $img_location_three = public_path('uploads/product_images/' . $img_name_three);
            Image::make($uploaded_img_three)->save($img_location_three);

            $product->update([
                'image_one' => $img_name_one,
                'image_three' => $img_name_three
            ]);
        } else if ($request->hasFile('image_two') && $request->hasFile('image_three')) {
            unlink(public_path('uploads/product_images/' . $product->image_two));
            unlink(public_path('uploads/product_images/' . $product->image_three));

            $uploaded_img_two = $request->file('image_two');
            $img_name_two = 'product_two_' . $product->id . '.' . $uploaded_img_two->getClientOriginalExtension();
            $img_location_two = public_path('uploads/product_images/' . $img_name_two);
            Image::make($uploaded_img_two)->save($img_location_two);

            $uploaded_img_three = $request->file('image_three');
            $img_name_three = 'product_three_' . $product->id . '.' . $uploaded_img_three->getClientOriginalExtension();
            $img_location_three = public_path('uploads/product_images/' . $img_name_three);
            Image::make($uploaded_img_three)->save($img_location_three);

            $product->update([
                'image_two' => $img_name_two,
                'image_three' => $img_name_three
            ]);
        } else if ($request->hasFile('image_one')) {
            unlink(public_path('uploads/product_images/' . $product->image_one));

            $uploaded_img_one = $request->file('image_one');
            $img_name_one = 'product_one_' . $product->id . '.' . $uploaded_img_one->getClientOriginalExtension();
            $img_location_one = public_path('uploads/product_images/' . $img_name_one);
            Image::make($uploaded_img_one)->save($img_location_one);

            $product->update([
                'image_one' => $img_name_one
            ]);
        } else if ($request->hasFile('image_two')) {
            unlink(public_path('uploads/product_images/' . $product->image_two));

            $uploaded_img_two = $request->file('image_two');
            $img_name_two = 'product_two_' . $product->id . '.' . $uploaded_img_two->getClientOriginalExtension();
            $img_location_two = public_path('uploads/product_images/' . $img_name_two);
            Image::make($uploaded_img_two)->save($img_location_two);

            $product->update([
                'image_two' => $img_name_two
            ]);
        } else if ($request->hasFile('image_three')) {
            unlink(public_path('uploads/product_images/' . $product->image_three));

            $uploaded_img_three = $request->file('image_three');
            $img_name_three = 'product_three_' . $product->id . '.' . $uploaded_img_three->getClientOriginalExtension();
            $img_location_three = public_path('uploads/product_images/' . $img_name_three);
            Image::make($uploaded_img_three)->save($img_location_three);

            $product->update([
                'image_three' => $img_name_three
            ]);
        }

        $product->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'product_details' => $request->product_details,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,
            'selling_price' => $request->selling_price,
            'discounted_price' => $request->discounted_price,
            'hot_deal' => $request->hot_deal,
            'best_rated' => $request->best_rated,
            'hot_new' => $request->hot_new,
            'trend' => $request->trend,
            'video_link' => $request->video_link
        ]);
        toast('Product Updated Successfully!', 'success');

        return redirect()->route('product.index');
    }

    //Show Single Product
    public function show($id) {
        $product = Product::find($id);

        return view('admin.pages.product.show', compact('product'));
    }

    //Delete Product
    public function delete($id) {
        $product = Product::find($id);
        $image_location_one = public_path('uploads/product_images/' . $product->image_one);
        $image_location_two = public_path('uploads/product_images/' . $product->image_two);
        $image_location_three = public_path('uploads/product_images/' . $product->image_three);
        unlink($image_location_one);
        unlink($image_location_two);
        unlink($image_location_three);
        $product->delete();
        toast('Product Deleted Successfully!', 'warning');

        return redirect()->route('product.index');
    }

    //Get Sub Category
    public function getSubCategory($category_id) {
        $sub_categories = SubCategory::where('category_id', $category_id)->get();

        return json_encode($sub_categories);
    }

    //Activate Product
    public function activate($id) {
        Product::find($id)->update([
            'status' => 1
        ]);
        toast('This Product Is Activated!', 'info');

        return redirect()->route('product.index');
    }

    //DeactivateProduct
    public function deactivate($id) {
        Product::find($id)->update([
            'status' => 2
        ]);
        toast('This Product Is Deactivated!', 'info');

        return redirect()->route('product.index');
    }
 }
