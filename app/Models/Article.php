<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
        /**
     * ARTICLE ATTRIBUTES
     * $this->attributes['id'] - int - contains the article primary key (id)
     * $this->attributes['name'] - string - contains the article name
     * $this->attributes['description'] - int - contains the article descriptiom
    */ 

    protected $fillable = ['name','description','game_id','user_id'];

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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getGameId(){
        return $this->attributes['game_id'];
    }   
    
    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at){
        $this->attributes['created_at'] = $created_at;
    }
    public function setGameId($gameId){
        $this->attributes['game_id'] = $gameId;
    }

    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function getGame()
    {
        return $this->game;
    }

    public function setGame($game)
    {
        $this->game = $game;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
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

    public static function validate($request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "game_id" => "required",
            "user_id" => "required",
        ]);

    }

    
}