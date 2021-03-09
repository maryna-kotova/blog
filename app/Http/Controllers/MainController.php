<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\Slider;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Всё для домашних животных';
        $products = Product::with('category')->recommended()->latest()->get();  
        $slider = Slider::all();

        return view('main.index', compact('title', 'products', 'slider'));
    }
    
    public function contacts()
    {
        $title = 'Контакты';
        return view('main.contacts', compact('title'));
    }

    public function getContacts(Request $requesr)
    {
        $validated = $requesr->validate([
            'name'    => 'required|min:3|max:255',
            'email'   => 'required|email',
            'message' => 'required|min:3',
        ]);  
        return back()->with('success', 'Thahks!');
    }
}


