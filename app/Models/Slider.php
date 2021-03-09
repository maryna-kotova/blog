<?php

namespace App\Models;

use App\Traits\NoImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, NoImage;

    protected $fillable = [
                            'name',     
                            'description', 
                            'img',
                            'button_text',
                            'button_url',                            
                          ];
}
