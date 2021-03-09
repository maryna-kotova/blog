@extends('layouts.main')
@section('title', 'Reviews')

@section('content')

    <div class="page-header">
        <p class="title">Отзывы</p>
    </div>
    <div class="windowMessage">
        @include('messages.errors')

        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>        
        @endif
    </div>

    @auth        
    
        <form action="/reviews" method="POST" class="formaReviews">
            @csrf 
            <div class="form-group">
                {{-- <label for="nameReviews">Имя</label> --}}
                <input type="text"  
                       name="nameReviews" 
                       id="nameReviews" 
                       class="form-control border-secondary inputReviewsName"                    
                       placeholder="Ваше имя"
                       value="{{old('nameReviews')}}">
            </div>
            <div class="form-group">
                {{-- <label for="review">Review</label> --}}
                <textarea name="review" 
                          id="review" 
                          class="form-control border-secondary textareaReviews"                      
                          placeholder="*Напишите свой отзыв">{{old('review')}}</textarea>
            </div>  
            <button class="btn-empty">Отправить</button>    
        </form>

    @else
        <p>Оставить отзыв можно только зарегистрированным пользователям</p>
        <a href="/login">Войти</a> / <a href="/register">Зарегистрироваться</a>
    @endauth

    <section class="showReviews">
        @forelse ($reviews as $review)
            <div class="border p-3 m-3">
            {{$review->name}} | {{ $review->created_at->format('d.m.Y') }} <hr><bloquote>{{$review->review}}</bloquote>
            </div>
            @empty
            <p>Добавьте отзыв к товару</p>
        @endforelse

            {{ $reviews->links() }}

    </section>
    
@endsection

@section('sidebar')
    {{-- @parent --}}
    Adress
    
@endsection
