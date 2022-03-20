<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
class Game extends Model
{
    use HasFactory;
        /**
     * GAME ATTRIBUTES
     * $this->attributes['id'] - int - contains the game primary key (id)
     * $this->attributes['name'] - string - contains the game name
     * $this->attributes['description'] - int - contains the game descriptiom
    */ 

    protected $fillable = ['name','description','price','genre','developer'];

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
    public function getDeveloper()
    {
        return $this->attributes['developer'];
    }
    public function setDeveloper($developer)
    {
        $this->attributes['developer'] = $developer;
    }
    public function getPrice()
    {
        return $this->attributes['price'];
    }
    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }
    public function getGenre()
    {
        return $this->attributes['genre'];
    }
    public function setGenre($genre)
    {
        return $this->attributes['genre'];
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getarticles()
    {
        return $this->articles;
    }

    public function setarticles($articles)
    {
        $this->articles = $articles;
    }   

    public static function validate($request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "genre" => "required",
        ]);

    }

    
}