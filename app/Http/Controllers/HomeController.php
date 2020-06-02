<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return "hello";
        return view('account.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    
    public function profile(){
        return view('home', [
            'title' => 'My Profile'
        ]);
    }
    
    
    public function orders(){
        return view('home', [
            'title' => 'My Orders'
        ]);
    }
    
    
    public function wishlist(){
        return view('home', [
            'title' => 'My Wishlist'
        ]);
    }
    
    
    public function track_orders(){
        return view('home', [
            'title' => 'Track Order'
        ]);
    }
}
