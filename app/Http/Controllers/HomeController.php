<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function about()
    {           
        return view('home.about');
    }
}
