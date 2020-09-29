<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }


    public function index() {
        $title = 'Dashboard';

        return view('admin.home', compact('title'));
    }


    public function logout() {
        Auth::logout();
        toast('Logout Successful!', 'success');

        return redirect('/admin');
    }
}
