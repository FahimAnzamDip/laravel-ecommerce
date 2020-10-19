<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function indexPage() {
        $title = 'Ecommerce - Home';

        $brands = Brand::latest()->get();

        $featured_products = Product::where('trend', 1)->where('status', 1)->latest()->take(8)->get();

        $best_sellers = Product::where('best_rated', 1)->where('status', 1)->latest()->take(8)->get();

        $new_products = Product::where('hot_new', 1)->where('status', 1)->latest()->take(8)->get();

        $categories = Category::take(4)->get();

        $slides = Slider::latest()->get();

        return view('index', compact('title', 'brands', 'featured_products', 'best_sellers', 'new_products', 'slides', 'categories'));
    }

    public function productDetails($id) {
        $product = Product::find($id);
        $related_products = Product::where('category_id', $product->category_id)->latest()->take(4)->get();

        return view('pages.product.productdetails', compact('product', 'related_products'));
    }

    public function shop(Request $request) {
        $title = 'Ecommerce - Shop';

        if ($request->has('category_id')) {
            $products = Product::where('category_id', $request->category_id)
                ->latest()->paginate(12);
        }
        else if ($request->has('sub_category_id')) {
            $products = Product::where('sub_category_id', $request->sub_category_id)
                ->latest()->paginate(12);
        }
        else {
            $products = Product::latest()->paginate(12);
        }

        return view('pages.shop', compact('products', 'title'));
    }

    public function about() {
        $title = 'Ecommerce - About Us';
        return view('pages.about', compact('title'));
    }

    public function contact() {
        $title = 'Ecommerce - Contact Us';
        return view('pages.contact', compact('title'));
    }

    public function productView($id) {
        $product = Product::find($id);

        return response()->json($product);
    }

    public function search(Request $request) {
        $query = $request->get('query');
        $products = Product::where('product_name', 'like', "%$query%")
                            ->orWhere('product_details', 'like', "%$query%")
                            ->paginate(9);

        return view('pages.search', compact('products'));
    }
}
