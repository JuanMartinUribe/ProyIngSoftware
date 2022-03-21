<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Order;
use App\Models\Item;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::all();
        $gamesInCart = [];
        $ids = $request->session()->get("games"); //we get the ids of the games stored in session
        if($ids){
            $gamesInCart = Game::findMany(array_keys($ids));
            /*foreach ($games as $key => $game) {
                if(in_array($key, array_keys($ids))){
                    $gamesInCart[$key] = $game;
                }
            }*/
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
        return back();
    }

    public function purchase(Request $request)
    {
 
        $gamesInSession = $request->session()->get("games");

        $games = Game::findMany(array_keys($gamesInSession));
        $order = new Order();
        $order->setTotal(0);
        $order->save();

        $total = 0;

        foreach ($games as $key => $game) {
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

        $order->setTotal($total);
        $order->save();

        dd("Felicitaciones");
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('games');
        return back();
    }
}