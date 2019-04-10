<?php


namespace App\Http\Controllers\Web;
use \App\Model\Category;
use \App\Model\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        $category = Category::all();
        $article = Article::paginate(2);
        $article2 = Article::latest()->limit(1)->get();
        return view('homee',['parsing' =>$category, 'article' => $article,'article2' => $article2,]);

    }
    
    public function blogpost(article $article)
    {   
        $category = Category::withCount('article')->get();
        //return $category;
        return view ('blogpost',['post'=>$article,'parsing' =>$category]);
    }
    public function getCategory($id_category)
    {
        $category = Category::findOrFail($id_category);        
        if ($category !==null){
            //$posts = Article::where('id_category',$id_category)->get();
            $posts = $category->article;
            return $posts;
        }
    }

}
