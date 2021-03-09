@extends('layouts.main')

@section('content')   

   <div class="page-header">
      <p class="title">Категории</p>
   </div>

   <section class="mainPageCategory">
      @foreach ($products as $product)

          @include('store.parts._product')

      @endforeach
  </section>

  {{$products->links()}}

@endsection
@section('title', $category->name);