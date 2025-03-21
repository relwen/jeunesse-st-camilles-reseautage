<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'author_name', 'author_email', 'content'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}

