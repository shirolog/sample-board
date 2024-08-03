<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [

        'tag_name' 
    ];

    //postとのリレーション関係
    public function post(){

        return $this->belongsTo(Post::class);
    }
}
