@extends('layouts.main')

@section('content') 
    <div class="page-header">
        <p class="title">{{ $title }}</p>
    </div>    
  
    @include('main.header') 

@endsection

@section('title', 'InCod')

<script>
function() {
 showName(this);
}

</script>

