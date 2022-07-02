<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show a player profile
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

}
