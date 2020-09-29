<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    //Show All Coupons
    public function index() {
        $title = 'Dashboard - Coupons';
        $coupons = Coupon::latest()->get();

        return view('admin.pages.coupon.index', compact('title', 'coupons'));
    }

    //Store or Create Coupon
    public function store(Request $request) {
        $request->validate([
            'coupon_name' => 'required|unique:coupons|max:255',
            'discount' => 'required|numeric|min:1|max:99',
            'valid_till' => 'required'
        ]);

        Coupon::create([
            'coupon_name' => $request->coupon_name,
            'discount' => $request->discount,
            'valid_till' => $request->valid_till,
            'created_at' => Carbon::now()
        ]);
        toast('Coupon Created Successfully!', 'success');

        return redirect()->route('coupon.index');
    }

    //Show The Coupon Edit Page
    public function edit($id) {
        $title = 'Dashboard - Edit Coupon';
        $coupon = Coupon::find($id);

        return view('admin.pages.coupon.edit', compact('title', 'coupon'));
    }

    //Update The Coupon
    public function update(Request $request, $id) {
        $request->validate([
            'coupon_name' => 'required|max:255',
            'discount' => 'required|numeric|min:1|max:99',
            'valid_till' => 'required'
        ]);

        Coupon::find($id)->update([
            'coupon_name' => $request->coupon_name,
            'discount' => $request->discount,
            'valid_till' => $request->valid_till
        ]);
        toast('Coupon Updated Successfully!', 'success');

        return redirect()->route('coupon.index');
    }

    //Delete The Coupon
    public function delete($id) {
        $coupon = Coupon::find($id);
        $coupon->delete();
        toast('Coupon Deleted Successfully', 'warning');

        return redirect()->route('coupon.index');
    }
}
