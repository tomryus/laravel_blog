<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \App\Model\Article;

class Category extends Model
{   
    protected $fillable =['nama_category', 'slug'];
    public function articles()
    {
        return $this->belongsTo(Article::class, 'id_category', 'id');
    }
}
