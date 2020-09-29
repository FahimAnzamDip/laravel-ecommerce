<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        $orders = Order::where('user_id', Auth::id())->get();

        return view('home', compact('orders'));
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $password = Auth::user()->password;
        $old_password = $request->old_password;

        if (Hash::check($old_password, $password)) {
            if ($old_password !== $request->password) {
                User::find(Auth::id())->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                toast('Password Changed! Please Login With New Password.', 'success');

                return redirect()->route('login');
            } else {
                toast('Old Password Can Not Be New Password!', 'error');
                return back();
            }
        } else {
            toast('Old Password Not Matched! Try Again.', 'error');
            return back();
        }
    }

    public function updateDetails(Request $request) {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'country' => 'required'
        ]);

        $address = Address::all();

        if (Auth::user()->address) {
            Address::find(Auth::user()->address->id)->update([
                'user_id' => Auth::id(),
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'country' => $request->country
            ]);
        } else {
            Address::create([
                'user_id' => Auth::id(),
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'country' => $request->country,
                'created_at' => Carbon::now()
            ]);
        }
        toast('User Details Updated!', 'success');

        return back();
    }

    public function logout() {
        Auth::logout();
        toast('Logout Successful!', 'success');

        return redirect()->route('login');
    }
}
