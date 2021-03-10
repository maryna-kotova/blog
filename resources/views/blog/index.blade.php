@extends('layouts.main')
@section('title', 'Blog')

@section('content')
    <div class="page-header">
        <p class="title">{{ $title }}</p>
    </div>
    
    <section class="mainPageCategory">
        @foreach ($articles as $article)            
            @include('store.parts._article')        
        @endforeach
    </section>
    {{-- <div class="paginations"> --}}
        {{$articles->links()}}
    {{-- </div> --}}
    
@endsection

