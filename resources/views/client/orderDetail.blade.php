<html>
<head>
    <link rel="stylesheet" href="{{asset('css/order.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<form action="{{url('client/placeOrder')}}" method="POST">
    @csrf
<div class="container-fluid my-5  d-flex  justify-content-center">
    <div class="card card-1">
        <div class="card-header bg-white">
            <button class="checkOut" type="submit">Đặt hàng</button>
            <div class="media flex-sm-row flex-column-reverse justify-content-between  ">
                <div class="col my-auto"> <h4 class="mb-0">Hóa đơn của bạn<span class="change-color"></span> </h4> </div>
                <div class="col-auto text-center  my-auto pl-0 pt-sm-4"> <img class="img-fluid my-auto align-items-center mb-0 pt-3"  src="{{asset('images/logo3.png')}}" width="115" height="115"> <p class="mb-4 pt-0 Glasses"></p>  </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-between mb-3">
                <div class="col-auto"> <h6 class="color-1 mb-0 change-color">Biên lai</h6> </div>
            </div>
            @if($cartItems->count()>0)
                @php $total = 0; @endphp
                @php $subtotal = 0; @endphp
                @foreach($cartItems as $item)
            <div class="row">
                <div class="col">
                    <div class="card card-2">
                        <div class="card-body">
                            <div class="media">
                                <div class="sq align-self-center "> <img class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{$item->url}}" width="135" height="135" /></div>
                                <div class="media-body my-auto text-right">
                                    <div class="row  my-auto flex-column flex-md-row">
                                        <div class="col my-auto"><b>Tên sản phẩm</b> <br>  {{$item->product_name}}</div>
                                        @foreach($category as $cate)
                                        <div class="col-auto my-auto"> <small><b>Danh mục</b><br>{{$cate->cate_name}}</small></div>
                                        @endforeach
                                        <div class="col my-auto"> <small><b>Giá :</b> {{number_format($item->prices, 0, '.', '.')}}<sup>đ</sup></small></div>
                                        <div class="col my-auto"> <small><b>Số lượng : </b>{{$item->quantity}}</small></div>
                                        <div class="col my-auto"><h6 class="mb-0">Tổng<br>{{number_format($item->prices * $item->quantity, 0, '.', '.')}}<sup>đ</sup></h6>
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
                    @php $total += $item->quantity * $item->prices @endphp
                @endforeach
            <div class="row mt-4">
                <div class="col">
                    <div class="row justify-content-between">
                        <div class="col-auto"><p class="mb-1 text-dark"><h3><b>Thông tin</b></h3></p>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Phí vận chuyển</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($userData as $data)
                                    <td>{{Auth::user()->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->address}}</td>
                                    <td>
                                    @foreach($charges as $fee)
                                        {{number_format($fee->fee, 0, '.', '.')}}<sup>đ</sup>
                                        @php $subtotal = $total + $fee->fee @endphp
                                        @endforeach
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
                    <div class="col-auto my-auto "><h2 class="mb-0 font-weight-bold">Tổng tiền: {{number_format($subtotal, 0, '.', '.')}}<sup>đ</sup>  </h2></div>
                    <div class="col-auto my-auto ml-auto"><h1 class="display-3 "></h1></div>
                </div>
            </div>
        </div>
            @endif
    </div>
</div>
</div>
</form>
</html>
