<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartsController extends Controller
{
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
            } else if ($product->discounted_price) {
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => 1,
                    'price' => $product->discounted_price,
                    'weight' => 1,
                    'options' => ['product_image' => $product->image_one]
                ]);
            }
        } else {
            return \Response::json(['error' => 'Product Is Out Of Stock!']);
        }

        return \Response::json(['success' => 'Added To Cart!']);
    }

    public function addToCartPost(Request $request) {
        $product = Product::find($request->id);

        if ($product->product_quantity > 0 && $request->quantity < $product->product_quantity ) {
            if ($product->discounted_price === null) {
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->selling_price,
                    'weight' => 1,
                    'options' => ['product_image' => $product->image_one]
                ]);
            } else if ($product->discounted_price) {
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->discounted_price,
                    'weight' => 1,
                    'options' => ['product_image' => $product->image_one]
                ]);
            }
        } else {
            toast('Product Is Out Of Stock!', 'error');

            return back();
        }
        toast('Added To Cart!', 'success');

        return back();
    }

    public function showCart() {
        $products = Cart::content();

        return view('pages.cart', compact('products'));
    }


    public function removeCart($rowId) {
        Cart::remove($rowId);
        Session::forget('coupon');
        toast('Product Removed From Cart!', 'warning');

        return back();
    }

    public function updateCart(Request $request) {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        toast('Quantity Updated!', 'success');

        return back();
    }
}
