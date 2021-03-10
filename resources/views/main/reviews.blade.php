@extends('layouts.main')
@section('title', 'Reviews')

@section('content')

    <div class="page-header">
        <p class="title">Reviews</p>
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
                <input type="text"  
                       name="nameReviews" 
                       id="nameReviews" 
                       class="form-control border-secondary inputReviewsName"                    
                       placeholder="Name"
                       value="{{old('nameReviews')}}">
            </div>
            <div class="form-group">                
                <textarea name="review" 
                          id="review" 
                          class="form-control border-secondary textareaReviews"                      
                          placeholder="*Write your review">{{old('review')}}</textarea>
            </div>  
            <button class="btn-empty">Send</button>    
        </form>

    @else
        <p>Only registered users can leave feedback</p>
        <a href="/login">Login</a> / <a href="/register">Register</a>
    @endauth

    <section class="showReviews">
        @forelse ($reviews as $review)
            <div class="border p-3 m-3">
            {{$review->name}} | {{ $review->created_at->format('d.m.Y') }} <hr><bloquote>{{$review->review}}</bloquote>
            </div>
            @empty
            <p>Add review</p>
        @endforelse

            {{ $reviews->links() }}

    </section>
    
@endsection

@section('sidebar')   
    {{-- menu --}}
@endsection
