<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = 
                            [
                                'order_id',
                                'product_name', 
                                'product_price', 
                                'product_qty', 
                                'product_img'
                            ];

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
