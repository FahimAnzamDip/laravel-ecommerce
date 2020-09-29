<?php

namespace App\Http\Controllers;

use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout() {
        if (Auth::check()) {
            $carts = Cart::content();
            return view('pages.checkout', compact('carts'));
        } else {
            toast('Please Login First!', 'error');
            return redirect()->route('login');
        }
    }

    public function applyCoupon(Request $request) {
        $request->validate([
            'coupon' => 'required'
        ]);

        $coupon = Coupon::where('coupon_name', $request->coupon)->first();

        if ($coupon) {
            if ($coupon->valid_till >= Carbon::now()->format('Y-m-d')) {
                Session::put('coupon', array(
                    'coupon_name' => $coupon->coupon_name,
                    'discount' => $coupon->discount,
                    'amount' => Cart::subtotal(2, '.', '') * ($coupon->discount / 100)
                ));
                toast('Coupon Applied Successfully!', 'success');
                return back();
            } else {
                toast('Coupon Is Expired!', 'error');
                return back();
            }
        } else {
            toast('Coupon Is Not Available!', 'error');
            return back();
        }
    }

    public function removeCoupon() {
        Session::forget('coupon');
        toast('Coupon Removed Successfully!', 'warning');

        return back();
    }
}
