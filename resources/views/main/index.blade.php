@extends('layouts.main')

@section('content')   

    {{-- @include('slider.slider') --}}
 
    <h1 class="text-center">{{ $title }}</h1>

    <div class="page-header">
        <p class="title"></p>
    </div>
   <footer>123</footer> <img src="" alt="ggggg">
    {{-- <section class="mainPageCategory">
        @foreach ($articles as $article)
  
            @include('blog.parts._article')
  
        @endforeach
    </section>    --}}

@endsection

@section('title', 'InCod')

<script>
function() {
 showName(this);
}

</script>

