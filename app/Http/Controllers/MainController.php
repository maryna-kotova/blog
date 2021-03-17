<?php

namespace App\Http\Controllers;

use App\Models\article;
class MainController extends Controller
{
    public function index()
    {        
        $title = 'Development like hobby';
        $articles = Article::with('category')->recommended()->latest()->get();          

        return view('main.index', compact('title', 'articles'));
    }  
}


