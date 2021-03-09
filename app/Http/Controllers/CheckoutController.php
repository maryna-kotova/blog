<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('store.checkout');
    }

    public function checkoutSave(Request $request)
    {       
        $validation = $request->validate([
                                            'name'    => 'required|min:3|max:200',
                                            'phone'   => 'required|max:13',
                                            'address' => 'required',
                                        ]);
        
        $order = new Order();

        $order->totalSum  = Session::get('totalSum');
        $order->name      = $request->name;
        $order->phone     = $request->phone;
        $order->address   = $request->address;
        $order->status_id = 1;

        $order->save();

        foreach(Session::get('cart') as $id => $product){
            $orderItem = new OrderItem();

            $orderItem->order_id      = $order->id;
            $orderItem->product_name  = $product['name'];
            $orderItem->product_price = $product['price'];
            $orderItem->product_qty   = $product['qty'];
            $orderItem->product_img   = $product['img'];

            $orderItem->save();
        }
        Cart::clear();


        // return back()->with('success', 'Спасибо за заказ');

        return view('store.checkout');        
    }
    
}
