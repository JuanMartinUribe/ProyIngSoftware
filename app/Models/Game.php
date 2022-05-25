<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
class Game extends Model
{
    use HasFactory;
        /**
         * GAME ATTRIBUTES
         * $this->attributes['id'] - int - contains the article primary key (id)
         * $this->attributes['name'] - string - contains the game name
         * $this->attributes['description'] - string - contains the game description
         * $this->attributes['created_at'] - date - contains the date of creation
         * $this->attributes['developer'] - string - contains the game developer
         * $this->attributes['genre'] - string - contains the game genre
         * $this->attributes['soldamount'] - int - contains the game sold amount
         * $this->attributes['price'] - string - contains the game price
         * $this->attributes['image'] - string - contains the string corresponding to the image file
         * $this->articles[] - Article - child articles of game
         * $this->items[] - Item - items where the game exists
         */ 

    protected $fillable = ['name','description','price','genre','developer','soldamount','image'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
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

    public function getSoldAmount()
    {
        return $this->attributes['soldamount'];
    }
    
    public function setSoldAmount($soldAmount)
    {
        $this->attributes['soldamount'] = $soldAmount;
    }

    public function getGenre()
    {
        return $this->attributes['genre'];
    }

    public function setGenre($genre)
    {
        $this->attributes['genre'] = $genre;
    }
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }   

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function setArticles($articles)
    {
        $this->articles = $articles;
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

    public static function validate($request)
    {   
        $request->validate(
            [
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric|gte:0",
            "genre" => "required",
            "developer" => "required",
            "image" => "required",
            ]
        );
    }
    public static function saveImage(Request $request,$game)
    {
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/games/', $filename);
            $game->image = $filename;
        }
        $game->save();
    }
    

}
