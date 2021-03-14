@extends('layouts.main')


@section('content')
   
   <div class="page-header">
      <p class="title">{{$article->name}}</p>
   </div>  
   <img src="{{$article->img}}" alt="{{$article->name}}" class="img-article">

   <p>{{ strip_tags($article->description) }}</p>
 
    <hr>
    <h4>Write your review</h4>

   {{-- Вывод ошибок --}}
   @include('messages.errors')
   @if(session('success'))
   <div class="alert alert-success">
       {{session('success')}}
   </div>        
   @endif 

   {{-- Фрма для отправки отзыва --}}
    @auth
    <form action="/reviews" method="POST" class="forms">
        @csrf
        <div class="form-group">            
        <input type="text"  
               id="nameReviews" 
               class="form-control @error('name') is-invalid @enderror" 
               name="nameReviews" 
               placeholder="Name"
               value="{{old('nameReviews')}}">
         @error('nameReviews') 
             <div class="invalid-feedback">{{$message}}</div>
         @enderror
        </div>
        <div class="form-group">            
            <textarea  id="review" 
                       class="form-control @error('reviews') is-invalid @enderror" name="review"                        
                       placeholder="Text...">{{old('review')}}</textarea>
            @error('review') 
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <button class="btn-full">Send</button>
    </form>
    @else 
      <p>Only registered users can leave feedback</p>
      <a href="/login">Login</a> / <a href="/register">Register</a>
    @endauth

    <hr>
    {{-- Все отзывы о данном товаре --}}
    <h4>Article reviews: {{ count($reviews) }}</h4>
        
    @forelse ($reviews as $review)
      <div class="block-bg p-3 m-3">
         <span class="review-top">{{$review->name}} | {{ $review->created_at->format('d.m.Y') }}</span> 
         <br>
         <br>
         <bloquote>{{$review->review}}</bloquote>
      </div>
      @empty
         <p>Add a review to the article</p>
    @endforelse 

    <div class="page-header">
        <p class="title">Recommended articles</p>
     </div>

    <div class="recomended-article">
        @foreach ($recommended as $article)  
            @include('store.parts._article')  
        @endforeach   
    </div>
@endsection

@section('title', $article->name)