<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
use App\Models\article;


class MainController extends Controller
{
    public function index()
    {        
        $title = 'Development like hobby';
        $articles = Article::with('category')->recommended()->latest()->get();          

        return view('main.index', compact('title', 'articles'));
    }
    
    public function contacts()
    {
        $title = 'Contacts';
        return view('main.contacts', compact('title'));
    }

    public function getContacts(ContactPostRequest $request)
    {
        $validated = $request->validated();

        return back()->with('success', 'Thahks!');
    }
}


