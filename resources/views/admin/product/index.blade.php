@extends('admin.layouts.index')

@section('content')
   <h1>Товары</h1>
   {{-- <a href="/admin/product/create" class="btn btn-primary">Добавить товар</a> --}}
   <a href="{{ asset('admin/product/create') }}" class="btn btn-primary">Добавить товар</a>
   {{-- <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить товар</a> --}}

   <table class="table" id="dataTable">
      <thead>
         <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Recommended</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
         @foreach ($products as $item)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td><img style="width: 50px;" src="{{asset($item->img)}}" alt="img"></td>
               <td>{{$item->name}}</td>
               <td>{{$item->category->name}}</td>
               <td>{{$item->price}}</td>
               <td>{!! $item->recommended !!}</td>
               <td>
                  <a href="/admin/product/{{ $item->id }}/edit" class="btn btn-warning text-white">Изменить</a>
                  {!! Form::open(['url' => '/admin/product/'.$item->id, 'method' => 'DELETE', 'class' => 'd-inline-block']) !!}
                     <button class="btn btn-danger text-white">Удалить</button>
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