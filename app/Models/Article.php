<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    
    protected $fillable = [
        'link',
        'title',
        'img',
        'content',
        
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
