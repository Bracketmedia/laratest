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
     * Show the application dashboard for sysadmin
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function systempanel()
    {
        return view('systempanel');
    }

    /**
     * Show the application dashboard for admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminpanel()
    {
        return view('adminpanel');
    }

    /**
     * Show the application dashboard for user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
}
