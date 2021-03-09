@extends('layouts.main')
@section('title', 'Sales')

@section('content')
    <div class="page-header">
        <p class="title">{{ $title }}</p>
    </div>
    
    <section class="mainPageCategory">
        @foreach ($products as $product)            
            @include('store.parts._product')        
        @endforeach
    </section>
    {{-- <div class="paginations"> --}}
        {{$products->links()}}
    {{-- </div> --}}
    
@endsection

