<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistsController extends Controller
{
    public function addWishlist($id) {
        $product_exists = Wishlist::where('user_id', Auth::id())->where('product_id', $id)->exists();

        if (Auth::check()) {
            if (!$product_exists) {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'product_id' => $id,
                    'created_at' => Carbon::now()
                ]);
                return \Response::json(['success' => 'Added To Wishlist!']);
            } else {
                return \Response::json(['error' => 'Already Exists In Wishlist!']);
            }
        } else {
            return \Response::json(['error' => 'Login First!']);
        }
    }

    public function showWishlist() {
        $wishlists = Wishlist::all();

        return view('pages.wishlist', compact('wishlists'));
    }

    public function removeWishlist($id) {
        Wishlist::find($id)->delete();
        toast('Product Removed From Wishlist!', 'warning');

        return back();
    }

    public function addToCart($id) {
        $product = Product::find($id);
        if ($product->product_quantity > 0) {
            if ($product->discounted_price === null) {
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => 1,
                    'price' => $product->selling_price,
                    'weight' => 1,
                    'options' => ['product_image' => $product->image_one]
                ]);
                $wishlist = Wishlist::where('product_id', $product->id)->first();
                $wishlist->delete();

                toast('Product Added To Cart!', 'success');

            } else if ($product->discounted_price) {
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => 1,
                    'price' => $product->discounted_price,
                    'weight' => 1,
                    'options' => ['product_image' => $product->image_one]
                ]);
                $wishlist = Wishlist::where('product_id', $product->id)->first();
                $wishlist->delete();

                toast('Product Added To Cart!', 'success');
            }
        }
        else {
            toast('Out Of Stock!', 'error');
        }

        return back();
    }
}
