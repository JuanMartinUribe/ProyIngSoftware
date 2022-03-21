<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

            /**
     * COMMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the comment primary key (id)
     * $this->attributes['description'] - string - contains the comment description
     * $this->attributes['created_at'] - date - contains the date of creation
     * $this->attributes['article_id'] - int - contains the id of the related parent article
     * $this->attributes['user_id'] - int - contains the id of the related parent user
     * $this->Article - Article - parent article of article
     * $this->user - User - parent user of article
    */ 
    
    protected $fillable = ['description','article_id','user_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at){
        $this->attributes['created_at'] = $created_at;
    }

    public function getArticleId(){
        return $this->attributes['article_id'];
    }   
    
    public function setArticleId($articleId){
        $this->attributes['article_id'] = $articleId;
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setArticle($article)
    {
        $this->article = $article;
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

    public static function validate($request)
    {
        $request->validate([
            "description" => "required",
            "article_id" => "required",
            "user_id" => "required",
        ]);

    }
}
