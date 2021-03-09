<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        Cart::add(Product::findOrFail($request->product_id), $request->qty);
        return view('store.parts._cart');
        // return $request->product_id;
    }
    public function clear()
    {
        Cart::clear();
        return view('store.parts._cart');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return view('store.parts._cart');
    }

    public function change(Request $request)
    {
        if( $request->qty <= 0 ){
            Cart::remove($request->id);
        }
        else{
            Cart::changeQty($request->id, $request->qty);
        }        
        return view('store.parts._cart');
    }
}


 