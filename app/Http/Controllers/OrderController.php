<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{

    public function index()
    {   
        $viewData = [];
        $viewData["orders"] = Order::where('user_id', Auth::id())->with('items')->get();
        $viewData["title"] = "Orders";
        $viewData["subtitle"] = "Your Orders";
        return view('order.index')->with('viewData', $viewData);
    }

    public function save(Request $request)
    {
        Order::validate($request);
        Order::create($request->only(["description","article_id","user_id"]));
        return redirect()->back();
    }
}
