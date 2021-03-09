<?php

namespace App\Models;

use App\Scopes\ProductScope;
use App\Traits\NoImage;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory, Sluggable, NoImage;

    protected $fillable = [
                            'name', 
                            'category_id', 
                            'price', 
                            'action_price',  
                            'slug', 
                            'recommended',
                            'description', 
                            'img'
                          ];



    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'id');
        //модель, назв столб с внешним ключем, назв столбца с текущей модели, назв столбца связанной модели
    }
    
    public function reviews()
    {
        return  $this->hasMany(Review::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new ProductScope);
    }

    public function scopeRecommended($query)
    {
        $query->where('recommended', 1);
    }

    public function scopeLatest($query)
    {
        $query->orderByDesc('created_at');
    }

    public function setRecommendedAttribute($value)
    {
        $this->attributes['recommended'] = $value ? $value : 0;
    }
    public function productRecommended()
    {
       return $this->belongsToMany(Self::class, 'products_recommendeds', 'product_id', 'recommended_id');
    }

}