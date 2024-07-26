<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'category_id',
        'title',
        'content',
    ];

    //カテゴリーとのリレーション関係
    public function category(){

        return $this->belongsTo(Category::class);
    }

    //userとのリレーション関係
    public function user(){

        return $this->belongsTo(User::class);
    }

    //commentsとのリレーション関係
    public function comments(){

        return $this->hasMany(Comment::class);
    }

}
