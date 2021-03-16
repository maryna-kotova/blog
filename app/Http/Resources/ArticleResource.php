<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request, Article $article)
    {
        // return parent::toArray($request); 
        $articles = Article::where('category_id', $article->category_id)->limit(2)->get(); 
        $relevatPosts = [];

        foreach($articles as $article){
          $relevatPosts[] = [
            'id' => $article->id,
            'name' => $article->name,
            'created_at' => $article->created_at,
          ];
        };
        return [
          'id' => $article->id,
          'name' => $article->name,
          'created_at' => $article->created_at,
          'relevant_posts' => $relevatPosts,
        ];   
    }
    
}
