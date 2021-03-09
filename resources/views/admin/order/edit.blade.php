@extends('admin.layouts.index')

@section('content')
   <div class="page-header">
      <p class="title">Редактирование заказа</p>
   </div>
    
    {!! Form::model($order, ['url' => '/admin/order/'.$order->id, 'files' => true, 'method' => 'put']) !!}
    
    @include('admin.order._form')

    {!! Form::close() !!}
  
@endsection


@section('js')

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
   var options = {
                  filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                  filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                  filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                  };    
   $('#lfm').filemanager('image');
   $('.recommended_products').select2();
</script>
@endsection