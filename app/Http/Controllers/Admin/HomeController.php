<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        
        if ($user && $user->getIsAdmin()) {
            return view('admin.index');
        }
        else
        {
            abort(404);
        }
    }

}