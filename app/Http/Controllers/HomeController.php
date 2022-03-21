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
        $viewData = [];
        $viewData["title"] = "About us - Online Store";
        $viewData["subtitle"] = "About Us";
        $viewData["description"] = "Web page made for you to discuss and buy your favorite games...";
        $viewData["author"] = "Developed by: Juan Martin & Daniel Giraldo";
        
        return view('home.about')->with("viewData",$viewData);
    }
}