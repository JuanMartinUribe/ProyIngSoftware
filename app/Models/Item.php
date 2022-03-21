<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['price'] - int - contains the item price
     * $this->attributes['quantity'] - int - contains the quantity
     * $this->attributes['game_id'] - int - contains the id of the related parent game
     * $this->attributes['order_id'] - int - contains the id of the related parent order
     * $this->order - Order - parent order of the item
     * $this->game - Game - parent game of the item
    */ 
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }
    
    public function getGameId()
    {
        return $this->attributes['game_id'];
    }
    public function setGameId($productId)
    {
        $this->attributes['game_id'] = $productId;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($orderId)
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function getOrder(){
        return $this->order;
    }
    
    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function getGame(){
        return $this->game;
    }

}