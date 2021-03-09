<?php

namespace App\Models;

use App\Traits\NoImage;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, Sluggable, NoImage;
}
