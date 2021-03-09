<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;

class NewsController extends Controller
{
    public function news()
    {
        $title = 'Новости';  
        $news   = News::orderByDesc('created_at')->paginate(10);   
        // $news = News::all();     

        return view('news.news', compact('title', 'news'));
    }
}
