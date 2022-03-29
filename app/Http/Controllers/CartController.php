<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Order;
use App\Models\Item;
use Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::all();
        $gamesInCart = [];
        $gameIds = $request->session()->get("games"); 
        if($gameIds)
        {
            $gamesInCart = Game::findMany(array_keys($gameIds));
        }
        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] =  "Shopping Cart";
        $viewData["games"] = $games;
        $viewData["gamesInCart"] =$gamesInCart;
        return view('cart.index')->with("viewData",$viewData);
    }

    public function add($id, Request $request)
    {
        $games = $request->session()->get("games");
        $games[$id] = $id;
        $request->session()->put('games', $games);
        return redirect()->route('cart.index');
    }

    public function purchase(Request $request)
    {
        $gamesInSession = $request->session()->get("games");
        if ($gamesInSession<1)
        {
            return redirect()->back();
        }
        $games = Game::findMany(array_keys($gamesInSession));
        $order = new Order();
        $order->setTotal(0);
        $order->setUserId(Auth::id());
        $order->save();
        $total = 0;
        foreach ($games as $key => $game) 
        {
            $item = new Item();
            $item->setQuantity(1);
            $item->setGameId($game->getId());
            $item->setPrice($game->getPrice());
            $item->setOrderId($order->getId());
            $item->save();
            $total = $total + $game->getPrice();
            //increment the times a game has been sold
            $game->setSoldAmount($game->getSoldAmount()+1);
            $game->save();
        }
        $user = Auth::user();
        if($total>$user->getBalance())
        {
            return redirect()->back();
        }
        else
        {
            $user->setBalance($user->getBalance()-$total);
        }
        $user->save();
        $order->setTotal($total);
        $order->save();
        $request->session()->forget('games');
        return redirect()->route('order.index');
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('games');
        return back();
    }
}