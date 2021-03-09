@extends('layouts.main')
@section('title', $title)

@section('content')

    <div class="page-header">
        <p class="title">{{ $title }}</p>
    </div>

    @foreach ($news as $new)
        <div class="news">           
            <img src="/images/news/{{$new->img}}" alt="{{ $title }}">   
            {{-- <img src="https://picsum.photos/300/200" alt="{{ $title }}">   --}}

            <article>
                <h3>{{ $new->title }}</h3>    
                <p>{{ $new->created_at}}</p>    
                <p>{{ $new->short_content }}</p>
            </article>            
        </div>
    @endforeach

    {{$news->links()}}

@endsection