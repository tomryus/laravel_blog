<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \App\Model\Category;

class Article extends Model
{
    protected $fillable =['title','slug','body','id_category','picture'];

    
    public function Category()
    {
        return $this->belongsTo(Category::class , 'id_category', 'id');
        
    }
    public function getRouteKeyName(){
        return 'slug' ;
    }
    
}
