<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
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
