<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Review;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Blog';          
        $articles   = Article::where('recommended', '=', 1)->paginate(5);    
        $categories = Category::all();       
        return view('blog.index', compact('title','articles'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        $articles = Article::where('category_id', $category->id)->paginate(5);       
        return view('blog.category', compact('category', 'articles'));
    }

    public function article(Article $article)
    {
        $recommended = $article->articleRecommended;        
        $reviews= Review::where('article_id', $article->id)->get();         
        
        return view('blog.article', compact('article', 'reviews', 'recommended'));
    }
}
