<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewslettersController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin')->except(['store']);
    }

    //Show All Newsletters
    public function index() {
        $title = "Dashboard - Newsletter";
        $newsletters = Newsletter::latest()->get();

        return view('admin.pages.newsletter.index', compact('title', 'newsletters'));
    }

    //Store or Create Newsletter
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        if (Newsletter::where('email', $request->email)->exists()) {
            alert()->info('Ops!','You are already in our subscriber list.');
        } else {
            Newsletter::create([
                'email' => $request->email,
                'created_at' => Carbon::now()
            ]);
            alert()->success('Success!','You are successfully subscribed to our newsletter.');
        }

        return redirect('/#newsletter-form');
    }

    //Delete the Newsletter
    public function delete($id) {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        toast('Newsletter email deleted successfully!', 'warning');

        return redirect()->route('newsletter.index');
    }

}
