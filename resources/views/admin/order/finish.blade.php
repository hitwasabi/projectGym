@extends('layouts.admin_base')

@section('content')
    <br>
    <h1 class="fas fa-shopping-cart">Finish Order</h1>
    <br>
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">Order by</th>
            <th scope="col">Order Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderItems as $item)
        <tr>
                <th scope="row">{{$item->name}}</th>
                <td>{{$item->order_name}}</td>
                <td>Đã xử lý</td>
                <td>
                    <a href="{{url('admin/order/'.$item->order_id.'/details')}}" >Check-Details </a>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
