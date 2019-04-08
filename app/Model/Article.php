<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \App\Model\Category;

class Article extends Model
{
    //protected $fillable =[];

    
    public function Category()
    {
        return $this->HasOne(Category::class , 'id_category', 'id');
        
    }
    
}
