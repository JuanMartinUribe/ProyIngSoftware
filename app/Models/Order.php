<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Order extends Model
{
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($t)
    {
        $this->attributes['total'] = $t;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function setUserId($userId){
        $this->attributes["user_id"] = $userId;
    }
    public function getUserId(){
        return $this->attributes["user_id"];
    }

}