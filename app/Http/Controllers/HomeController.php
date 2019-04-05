<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helpers;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' ); // , ['except'=>['helpers']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Show the view page using Helpers
    function helpers()
    {
        $test = Helpers::sample_function();
        return $test;
    }

}
