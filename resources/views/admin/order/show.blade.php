@extends('admin.layouts.index')

@section('content')
    <h1>Information about an order</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>    
    @endif

    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>№</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->order_id}}</td>
                    <td><img src="{{asset($item->product_img)}}" alt="image" style="width: 70px"></td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->product_price}}</td>
                    <td>{{$item->product_qty}}</td>
                    <td>{{$item->product_qty * $item->product_price}}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="font-weight-bold">
                <td colspan="4" class="text-right"></td>
                <td>Total:</td>
                <td>
                    {{$totalSum[0]->totalSum}}
                </td>
            </tr>
        </tfoot>
    </table>
@endsection


@section('js')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection