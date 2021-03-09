<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

class StoreController extends Controller
{
    public function sale()
    {
        $title = 'Акции';          
        $products   = Product::where('recommended', '=', 1)->paginate(2);// выводит ограниченное кол-во товаров на странице с пагинацией        
        $categories = Category::all();       
        return view('store.sale', compact('title','products'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(2);       
        return view('store.category', compact('category', 'products'));
    }

    public function product(Product $product)
    {
        $recommended = $product->productRecommended;        
        $reviews= Review::where('product_id', $product->id)->get();         
        
        return view('store.product', compact('product', 'reviews', 'recommended'));
    }
}
