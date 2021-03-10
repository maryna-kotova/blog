<?php

namespace App\Models;

use App\Traits\NoImage;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory, Sluggable, NoImage;

    protected $fillable = ['name', 'slug', 'description', 'img'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}  
