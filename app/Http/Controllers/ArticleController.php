<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\Article;
use Illuminate\Validation\Rule;
use Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $article = Article::latest()->get();
        return view('article.index',['yangdikirim'=>$article]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = \App\Model\Category::all();
        return view ('article.create',['yangdikirim' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            'title' => "required|min:5",
        ])->validate();

        $image = $request->file('picture')->store('article');
        Article::Create([
            'title'         => $request->title,
            'slug'          => str_slug($request->title),
            'picture'       => $image,
            'body'          => $request->body,
            'id_category'   => $request->id_category,

        ]);
        return redirect()->route('article.index')->with('status', 'Artikel berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $article = Article::find($id);
            $category = \App\Model\Category::all();            
            return view('article.edit',['yangdikirim'=>$article,'item'=>$category]);
            //return $article;
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        \Validator::make($request->all(),[
            'title' => "required|min:5",
            "picture" => "required",
        ])->validate();
        
        $article = Article::find($id);

        Storage::delete($article->picture);
        $article->update([
            'title'         => $request->title,
            'slug'          => str_slug($request->title),
            'picture'       => $request->file('picture')->store('article'),
            'body'          => $request->body,
            'id_category'   => $request->id_category,
        ]);
        return redirect()->route('article.index')->with('status', 'Artikel berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        Storage::delete($article->picture);
        $article->delete();
        return redirect()->route('article.index')->with('status', 'Artikel berhasil dihapus');
    }
}
