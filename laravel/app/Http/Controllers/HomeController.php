<?php

namespace itsep\Http\Controllers;
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
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $UserEmail = \Auth::user()->email;
        return view('home')->with('UserEmail',$UserEmail );
    }
    public function logout()
    {
        \Auth::logout();
      return view('auth/login');
      }
}
