@extends('admin.layouts.index')

@section('content')
   <h1>Слайдер</h1> 
   <a href="{{ asset('admin/slider/create') }}" class="btn btn-primary">Добавить слайд</a>  

   <table class="table" id="dataTable">
      <thead>
         <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Button text</th>
            <th>Button url</th>
            <th>Alt</th>            
            <th></th>
         </tr>
      </thead>
      <tbody>
         @foreach ($slider as $item)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td><img style="width: 50px;" src="{{asset($item->img)}}" alt="img"></td>
               <td>{{$item->name}}</td>
               <td>{{ strip_tags($item->description) }}</td>
               <td>{{$item->button_text}}</td>
               <td>{{$item->button_url }}</td>               
               <td>{{$item->alt}}</td>              
               <td>
                  <a href="/admin/slider/{{ $item->id }}/edit" class="btn btn-warning text-white">Изменить</a>
                  {!! Form::open(['url' => '/admin/slider/'.$item->id, 'method' => 'DELETE', 'class' => 'd-inline-block']) !!}
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
