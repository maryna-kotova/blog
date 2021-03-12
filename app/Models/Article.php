<?php

namespace App\Models;

use App\Scopes\ArticleScope;
use App\Traits\NoImage;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\Sanctum;

class Article extends Model
{
    use HasFactory, Sluggable, NoImage, HasApiTokens;

    protected $fillable = 
                        [
                            'name', 
                            'category_id',                            
                            'slug', 
                            'recommended',
                            'description', 
                            'img'
                        ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'id');
    }
    
    public function reviews()
    {
        return  $this->hasMany(Review::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new ArticleScope);
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

    public function articleRecommended()
    {
       return $this->belongsToMany(Self::class, 'articles_recommendeds', 'article_id', 'recommended_id');
    }

    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }

    public function getRelevantArticles()
    {
        $articles = Article::where('category_id', '=', $this->category->id)->limit(2);
        
        $relevantArticles = [];
        foreach ( $articles as $article ){
            $relevantArticles[] = [
                'id' => $article->id,
                'name' => $article->name,
                'created_at' => $article->created_at,
            ];
        }
        return $relevantArticles;
    }


}