<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $article  = Article::where('id', '=', $id)->paginate(5);    
        $articles = Article::where('category_id', '=', $this->category->id)->limit(2);
        
        $relevantArticles = [];
        foreach ( $articles as $article ){
            $relevantArticles[] = [
                'id' => $article->id,
                'name' => $article->name,
                'created_at' => $article->created_at,
            ];
        }     
        return view('blog.index', compact('title','articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $articles = Article::create($input);
        return $this->sendResponse($articles->toArray(), 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        
        return $this->sendResponse($article->toArray(), 'Article retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $input = $request->all();
      
        $article->name = $input['name'];
        $article->detail = $input['detail'];
        $article->save();
        return $this->sendResponse($article->toArray(), 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return $this->sendResponse($article->toArray(), 'Article deleted successfully.');
    }
}
