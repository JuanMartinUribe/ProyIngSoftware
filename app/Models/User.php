<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }
    public function getIsAdmin()
    {
        return $this->attributes['isAdmin'];
    }

    public function setIsAdmin($isAdmin)
    {
        $this->attributes['isAdmin'] = $isAdmin;
    }

    public function getBalance()
    {
        return $this->attributes["balance"];
    }

    public function setBalance($balance)
    {
        $this->attributes["balance"] = $balance;
    }

    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at){
        $this->attributes['created_at'] = $created_at;
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getArticles()
    {
        return $this->articles();
    }

    public function setArticles($articles)
    {
        $this->articles = $articles;
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders()
    {
        return $this->orders;
    }

    public function setOrders($orders)
    {
        $this->orders = $orders;
    }


}
