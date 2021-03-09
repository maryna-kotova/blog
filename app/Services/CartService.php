<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{

   public function add(Product $product, $qty)
   {
      if( Session::get('cart.'.$product->id) ){
         $oldQty = Session::get('cart.' . $product->id . '.qty');
         Session::put('cart.' . $product->id . '.qty', $oldQty + $qty);
      }
      else{      
         $data = [
                  'id'    => $product->id,
                  'name'  => $product->name,
                  'price' => $product->price,
                  'img'   => $product->img,
                  'qty'   => $qty,
               
               ];
         Session::put('cart.' . $product->id, $data);
      }
      self::totalSum();
   }

   public function clear()
   {
      Session::forget('cart');
      Session::forget('totalSum');
   }

   public function remove($id)
   {
      Session::forget('cart.' . $id);
      self::totalSum();
   }

   public function changeQty($id, $qty)
   {
      Session::put("cart.{$id}.qty", $qty);
      self::totalSum();
   }

   public static function totalSum()
   {
      $total = 0;
      foreach( Session::get('cart') as $product ){
         $total += $product['price']*$product['qty'];
      }
      Session::put('totalSum', $total);
   }
}
