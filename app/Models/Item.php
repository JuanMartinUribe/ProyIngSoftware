<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

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

    public function setOrderId($pId)
    {
        $this->attributes['order_id'] = $pId;
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
    public function getGame(){
        return $this->game;
    }

}