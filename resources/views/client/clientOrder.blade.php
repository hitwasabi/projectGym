@extends('layouts.base')
@section('title',"Giỏ hàng")
@section('content')
    @include('client.header')
{{--    <link rel="stylesheet" href="{{asset('css/order.css')}}">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>--}}
    <div class="titlepage">
        <h1>Lịch sử mua hàng</h1>
    </div>
<form action="{{url('client/home')}}" method="GET">
    @csrf
    <div class="container-fluid my-5  flex  justify-content-center">
        <div class="card card-1">
            <div class="card-header bg-white">
                <form action="{{url('client/home')}}" method="GET">
                <button type="submit" >Về trang chủ</button>
                </form>
                <div class="media flex-sm-row flex-column-reverse justify-content-between  ">
                    <div class="col my-auto"> <h4 class="mb-0">Những hóa đơn của bạn<span class="change-color"></span> </h4> </div>
                    <div class="col-auto text-center  my-auto pl-0 pt-sm-4"> <img class="img-fluid my-auto align-items-center mb-0 pt-3"  src="{{asset('images/logo3.png')}}" width="115" height="115"> <p class="mb-4 pt-0 Glasses"></p>  </div>
                </div>
            </div>
            @if($orderItems->count()==0)
                <h1>Không có gì cả</h1>
            @else
            <div class="card-body">
                <div class="row justify-content-between mb-3">
                    <table class="table table-bordered border-primary">
                        <thead>
                        <tr>
                            <th scope="col">Người mua</th>
                            <th scope="col">Tên người mua</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderItems as $item)
                            <tr>
                                <th scope="row">{{$item->name}}</th>
                                <td>{{$item->order_name}}</td>
                                <td>
                                    @if($item->order_status==0)
                                    Chưa xử lý
                                    @elseif($item->order_status==1)
                                    Đang xử lý
                                    @elseif($item->order_status==2)
                                    Đang giao
                                    @else
                                    Đã hủy
                                    @endif
                                </td>
                                <td>
                                    <form action="{{url('client/'.$item->order_id.'/details')}}" method="GET">
                                        @csrf
                                        <button type="submit" >Xem chi tiết đơn hàng </button>
                                    </form>
                                </td>
                            </tr>

    @endforeach
</tbody>
</table>
            @endif
    </div>
    </div>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
              {{--      @if($orderItems->count()==0)
                        <div class="col-auto"> <h6 class="color-1 mb-0 change-color">Nothing here~~</h6> </div>
                    @else
                    <div class="col-auto"> <h6 class="color-1 mb-0 change-color">Receipt</h6> </div>
                    @foreach($orderItems as $order)
                    <div class="col-auto"> <h6 class="color-1 mb-0 change-color">Status :
                            @if($order->order_status==0)
                                Đang chờ xác nhận
                            @elseif($order->order_status==1)
                                Đang xử lý
                            @elseif($order->order_status==2)
                                Đang giao hàng
                            @else
                                Đơn hàng đã bị hủy
                            @endif
                        </h6> </div>
                    @endforeach
                </div>
                @if($orderDetails->count()>0)
                    @php $total = 0; @endphp
                    @php $subtotal = 0; @endphp
                    @foreach($orderDetails as $item)
                        <div class="row">
                            <div class="col">
                                <div class="card card-2">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="sq align-self-center "> <img class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{$item->url}}" width="135" height="135" /></div>
                                            <div class="media-body my-auto text-right">
                                                <div class="row  my-auto flex-column flex-md-row">
                                                    <div class="col my-auto"><b>Tên sản phẩm</b> {{$item->product_name}}</div>
                                                        <div class="col-auto my-auto"> <small><b>Danh mục</b><br>{{$item->cate_name}}</small></div>
                                                    <div class="col my-auto"> <b>Giá :</b><small> {{number_format($item->price, 0, '.', '.')}}<sup>đ</sup> </small></div>
                                                    <div class="col my-auto"> <b>Số lượng : </b><small>{{$item->quantity}}</small></div>
                                                    <div class="col my-auto"><h6 class="mb-0">Tổng : {{number_format($item->price * $item->quantity, 0, '.', '.')}}<sup>đ</sup> </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mt-auto">
                                                <div>  </div>
                                                <div class="media row justify-content-between ">
                                                    <div class="col-auto text-right"><span> <small  class="text-right mr-sm-2"></small> <i class="fa fa-circle active"></i> </span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $total += $item->quantity * $item->price @endphp
                    @endforeach
                    <div class="row mt-4">
                        <div class="col">
                            <div class="row justify-content-between">
                                <div class="col-auto"><p class="mb-1 text-dark"><h3><b>Informations</b></h3></p>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Delivery Charge</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($orderItems as $data)
                                                <td>{{Auth::user()->name}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->phone}}</td>
                                                <td>{{$data->address}}</td>
                                                <td>
                                                        {{number_format($data->fee, 0, '.', '.')}}<sup>đ</sup>
                                                        @php $subtotal = $total + $data->fee @endphp
                                                </td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="jumbotron-fluid">
                            <div class="row justify-content-between ">
                                <div class="col-auto my-auto "><h2 class="mb-0 font-weight-bold">Total order : {{number_format($subtotal, 0, '.', '.')}}<sup>đ</sup>  </h2></div>
                                <div class="col-auto my-auto ml-auto"><h1 class="display-3 "></h1></div>
                            </div>
                        </div>
                    </div>
                @endif
                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</form>--}}
{{--</html>--}}

