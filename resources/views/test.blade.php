@extends('layouts.main')


@section('content')
   
   
    <p>Name: {{$article->name}}</p>    
    <p>ID: {{ $article->id }}</p>
    <p>Category ID: {{ $article->category_id }}</p>
    <p>Created:{{ $article->created_at }}</p>
   
 
    
    <div class="page-header">
        <p class="title">More articles</p>
     </div>
    
        @foreach ($moreArticles as $item)            
            <p>Name: {{$article->name}}</p>    
            <p>ID: {{ $article->id }}</p>
            <p>Category ID: {{ $article->category_id }}</p>
            <p>Created:{{ $article->created_at }}</p>              
            <hr>
        @endforeach
    
@endsection

@section('title', $article->name)