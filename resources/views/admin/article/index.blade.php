@extends('admin.layouts.index')

@section('content')
   <h1>Articles</h1> 
   <a href="{{ asset('admin/article/create') }}" class="btn btn-primary">Add article</a>

   <table class="table" id="dataTable">
      <thead>
         <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>            
            <th>Recommended</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
         @foreach ($articles as $item)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td><img style="width: 50px;" src="{{asset($item->img)}}" alt="img"></td>
               <td>{{$item->name}}</td>
               <td>{{$item->category->name}}</td>               
               <td>{!! $item->recommended !!}</td>
               <td>
                  <a href="/admin/article/{{ $item->id }}/edit" class="btn btn-warning text-white">Change</a>
                  
                  {!! Form::open(['url' => '/admin/article/'.$item->id, 'method' => 'DELETE', 'class' => 'd-inline-block']) !!}
                     <button class="btn btn-danger text-white">Del</button>
                  {!! Form::close() !!}    
               </td>

            </tr>
         @endforeach

      </tbody>
   </table>

@endsection

@section('js')
   <script>
         $(document).ready( function () {
            $('#dataTable').DataTable();
         } );
   </script>    
@endsection