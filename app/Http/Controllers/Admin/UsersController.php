<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    //Show All Users
    public function index() {
        $title = 'Dashboard - Users';
        $users = User::latest()->get();

        return view('admin.pages.users.index', compact('users', 'title'));
    }
}
