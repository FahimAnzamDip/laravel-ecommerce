<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function orderTracker() {
        return view('pages.tracker');
    }

    public function orderTrackerProcess(Request $request) {
        $request->validate([
            'tracker' => 'required'
        ]);

        $order = Order::where('tracker', $request->tracker)->first();

        if ($order) {
            if ($order->user_id == Auth::user()->id) {
                if ($order->status == 4) {
                    toast('This Order Is Canceled!', 'error');
                    return back();
                } else {
                    return view('pages.tracker', compact('order'));
                }
            } else {
                toast('The Tracking ID Is Invalid!', 'error');
                return back();
            }
        } else{
            toast('The Tracking ID Is Invalid!', 'error');
            return back();
        }
    }
}
