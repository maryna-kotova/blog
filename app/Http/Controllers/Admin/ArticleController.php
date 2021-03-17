<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
        
        foreach ($articles as $article) {
            if($article->recommended == 1){
                $article->recommended = '<i class="fas fa-check" style="color:lightgreen"></i>';
            }
            else $article->recommended = '<i class="fas fa-check" style="color:lightgray"></i>';
            // else $product->recommended = '';
        }

        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $allArticles = Article::all()->pluck('name', 'id');
        return view('admin.article.create', compact('categories', 'allArticle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([            
                                            'name'        => 'required|min:3|max:255',
                                            'description' => 'required|min:3|',                                     
                                        ]);

        $article = Article::create( $request->all() );  
        $article->articleRecommended()->sync($request->articleRecommended);

        return redirect('/admin/article');
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
        $article = Article::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');
        $allArticles = Article::all()->pluck('name', 'id');

        return view('admin.article.edit', compact('article', 'categories', 'allArticles'));
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
        
        $validated = $request->validate([            
                                        'name'        => 'required|min:3|max:255', 
                                        'description' => 'required|min:3|',                                     
                                        'slug'        => 'required|unique:article,slug,'.$id.'|min:3|max:30',                                           
                                        ]);

        $article = Article::findOrFail($id);        
        $article -> update( $request->all() ); 
        $article->articleRecommended()->sync($request->articleRecommended);

        return redirect('/admin/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return redirect('/admin/article');
    }    
}
