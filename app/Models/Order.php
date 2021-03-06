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
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the article primary key (id)
     * $this->attributes['total'] - int - contains the total of the order
     * $this->attributes['user_id'] - int - contains the id of the owner user
     * $this->attributes['created_at'] - date - contains the date of creation
     * $this->items[] - Item - child items of the order
     * $this->user - User - Owner of the orderr
     */ 
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

    public function setUserId($userId)
    {
        $this->attributes["user_id"] = $userId;
    }

    public function getUserId()
    {
        return $this->attributes["user_id"];
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
