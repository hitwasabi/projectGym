@extends('layouts.admin_base')

@section('content')
    <br>
    <h1 class="fas fa-shopping-cart">Order Detail</h1>
    <br>
    <br>
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Code</th>
            <th scope="col">Quantity</th>
            <th scope="col">Prices</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        @php $total=0; @endphp
        @php $subtotal=0; @endphp
        @foreach($orderItems as $item)
        <tr>
                <th scope="row"><img src="{{$item->url}}" width="90px"></th>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_code}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{number_format($item->price, 0, '.', '.')}}<sup>đ</sup></td>
                <td>{{number_format($item->quantity * $item->price, 0, '.', '.')}}<sup>đ</sup></td>
        </tr>
            @php $total += $item->quantity * $item->price @endphp
        @endforeach
        @php $subtotal = $total  @endphp
        <tr>
            <h3>Order total : {{number_format($subtotal, 0, '.', '.')}}<sup>đ</sup></h3>
        </tr>
        </tbody>
    </table>
@endsection
