<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//        Pass list of users into the controller
        $users = User::where('id','!=', Auth::user()->id)->get();
        return view('dashboard.chat',compact('users'));
    }

    public function user()
    {
//        get authenticated user in the api
        return Auth::user();
    }
}
