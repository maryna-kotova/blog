<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();
        
        foreach ($products as $product) {
            if($product->recommended == 1){
                $product->recommended = '<i class="fas fa-check" style="color:lightgreen"></i>';
            }
            else $product->recommended = '<i class="fas fa-check" style="color:lightgray"></i>';
            // else $product->recommended = '';
        }

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $allProducts = Product::all()->pluck('name', 'id');
        return view('admin.product.create', compact('categories', 'allProducts'));
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
                                            'name'  => 'required|min:3|max:255',
                                            'price' => 'required|numeric|min:1',                                     
                                        ]);

        $product = Product::create( $request->all() );  
        $product->productRecommended()->sync($request->productRecommended);

        return redirect('/admin/product');
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
        $product = Product::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');
        $allProducts = Product::all()->pluck('name', 'id');

        return view('admin.product.edit', compact('product', 'categories', 'allProducts'));
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
                                        'name'  => 'required|min:3|max:255',
                                        'price' => 'required|numeric|min:1',
                                        'slug'  => 'required|unique:products,slug,'.$id.'|min:3|max:30',                                           
                                        ]);

        $product = Product::findOrFail($id);        
        $product -> update( $request->all() ); 
        $product->productRecommended()->sync($request->productRecommended);

        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/admin/product');
    }    
}
