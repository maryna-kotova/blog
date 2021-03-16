<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
          ]
        };
        return [
          'id' => $article->id,
          'name' => $article->name,
          'created_at' => $article->created_at,
          'relevant_posts' => $relevatPosts,
          ] 
    }
}
