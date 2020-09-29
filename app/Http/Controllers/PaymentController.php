<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderedProduct;
use App\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function payment(Request $request) {
        $request->validate([
            'name' => 'required',
            'company_name' => 'nullable',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'payment_method' => 'required'
        ]);

        if ($request->payment_method == 1) {
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'company_name' => $request->company_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'payment_method' => $request->payment_method,
                'sub_total' => Cart::subtotal(2, '.', ''),
                'total' => Cart::total(2, '.', ''),
                'final_amount' => $request->final_amount,
                'tracker' => mt_rand(1000000, 9999999),
                'created_at' => Carbon::now()
            ]);

            foreach (Cart::content() as $cart_item) {
                OrderedProduct::create([
                    'order_id' => $order_id,
                    'user_id' => Auth::id(),
                    'product_id' => $cart_item->id,
                    'quantity' => $cart_item->qty,
                    'created_at' => Carbon::now()
                ]);
                Product::find($cart_item->id)->decrement('product_quantity', $cart_item->qty);
            }
            Cart::destroy();
            Session::forget('coupon');
            toast('Your order has been placed!', 'success');

            return redirect()->route('user.home');
        }
        else if ($request->payment_method == 2) {
            echo "Stripe Payment";
        }

    }
}
