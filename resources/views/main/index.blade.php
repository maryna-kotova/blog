@extends('layouts.main')

{{-- @section('css')
    <link rel="stylesheet" href="css/style.css">    
@endsection --}} 

@section('content')   

    @include('slider.slider')
 
    <h1 class="text-center">{{ $title }}</h1>

    <div class="page-header">
        <p class="title">Категории</p>
    </div>
    <section class="mainPageCategory">
        @foreach ($products as $product)
  
            @include('store.parts._product')
  
        @endforeach
    </section>
  
    {{-- {{$products->links()}} --}}

@endsection

{{-- @section('title')
    {{ $title }} 
@endsection --}} 
@section('title', 'Cat&Dog')


