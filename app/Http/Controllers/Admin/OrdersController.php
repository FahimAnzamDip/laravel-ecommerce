<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin')->except(['orderTracker', 'orderTrackerProcess']);
    }

    public function orders(Request $request) {
        if ($request->has('status') && $request->status == 0) {
            $new_orders = Order::where('status', 0)->latest()->get();
            return view('admin.pages.orders.neworders', compact('new_orders'));
        }
        else if ($request->has('status') && $request->status == 1) {
            $processed_orders = Order::where('status', 1)->latest()->get();
            return view('admin.pages.orders.processedorders', compact('processed_orders'));
        }
        else if ($request->has('status') && $request->status == 2) {
            $shipped_orders = Order::where('status', 2)->latest()->get();
            return view('admin.pages.orders.shippedorders', compact('shipped_orders'));
        }
        else if ($request->has('status') && $request->status == 3) {
            $delivered_orders = Order::where('status', 3)->latest()->get();
            return view('admin.pages.orders.deliveredorders', compact('delivered_orders'));
        }
        else if ($request->has('status') && $request->status == 4) {
            $canceled_orders = Order::where('status', 4)->latest()->get();
            return view('admin.pages.orders.canceledorders', compact('canceled_orders'));
        }
    }

    public function orderDetails($id) {
        $order = Order::find($id);

        return view('admin.pages.orders.orderdetails', compact('order'));
    }

    public function orderProcess(Request $request) {
        if ($request->status == 1) {
            Order::find($request->id)->update([
                'status' => 1
            ]);
            toast('Order Accepted! Get On Processing.', 'success');
        }
        else if ($request->status == 2) {
            Order::find($request->id)->update([
                'status' => 2
            ]);
            toast('Order Is Shipping!', 'success');
        }
        else if ($request->status == 3) {
            Order::find($request->id)->update([
                'status' => 3
            ]);
            toast('Delivery Done!', 'success');
        }
        else if ($request->status == 4) {
            Order::find($request->id)->update([
                'status' => 4
            ]);
            toast('Order Canceled!', 'warning');
        }

        return redirect()->route('orders', ['status' => 0]);
    }
}
