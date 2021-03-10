@extends('layouts.main')

@section('content')   

   <div class="page-header">
      <p class="title">Category</p>
   </div>

   <section class="mainPageCategory">
      @foreach ($articles as $article)

          @include('store.parts._article')

      @endforeach
  </section>

  {{$articles->links()}}

@endsection
@section('title', $category->name);