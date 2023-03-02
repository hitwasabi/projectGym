@extends('layouts.admin_base')

@section('content')
    <br>
    <h1 class="fas fa-shopping-cart">Pending Order</h1>
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
                <td>Đang xử lý</td>
                <td>
                    <table>
                        <th>
                            <a href="{{url('admin/order/'.$item->order_id.'/details')}}" >Check-Details </a>
                            &nbsp;</th>
                        <th>
                            <form action="{{url('admin/order/'.$item->order_id.'/updateOrder')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Confirm Order</button>
                            </form>
                        </th>
                        <th>
                            <form action="{{url('admin/order/'.$item->order_id.'/cancelOrder')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"> Cancel Order</button>
                            </form>
                        </th>
                    </table>
                </td>
            </tr>
            </form>
        @endforeach
        </tbody>

    </table>
@endsection
