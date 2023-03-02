@extends('layouts.base')
@section('title',"Giỏ hàng")
@section('content')
    @include('client.header')
<div class="container-fluid">
    <div class="titlepage">
        <h1>Giỏ hàng</h1>
    </div>
    <div class="row">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                        <tr class="small text-uppercase">
                            <th scope="col"><b>Chi tiết đơn hàng</b></th>
                            <th scope="col"><b>Hương vị</b></th>
                            <th scope="col" width="120"><b>Số lượng</b></th>
                            <th scope="col" width="120"><b>Giá</b></th>
                            <th>Tổng</th>
                        </tr>
                        </thead>
                        <tbody1>
                        @if($cartItems->count()==0)
                    </table>
                    <h2>Bạn chưa thêm gì vào giỏ hàng cả</h2>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <form>
                        <div class="form-group"> <label>Nhập mã giảm giá nếu có</label>
                            <div class="input-group"> <input type="text" class="form-control1 coupon" name="" placeholder="Mã giảm giá">
                                <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Áp dụng</button> </span> </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{url('client/home')}}" class="btn1 btn1-out btn1-success btn1-square btn1-main mt-2" data-abc="true">Tiếp tục mua hàng</a>
        </aside>
    </div>
</div>
                        @endif
                        @if($cartItems->count()>0)
                            @php $total = 0; @endphp
                            @php $subtotal = 0; @endphp
                            @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside" name="url"><img src="{{$item->url}}" width="100px" class="img2-sm"></div>
                                        <figcaption class="info" name="product_name"><p>Name : {{$item->product_name}}</p>
                                            @foreach($category as $cate)
                                            <p class="text-muted small" name="cate_name">Category : {{$cate->cate_name}}</p>
                                            @endforeach
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <form method="post" action="{{url('/client/cart/'.$item->cart_id.'/update')}}">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{$item->cart_id}}">
                                        @foreach($quantity as $quan)
                                        <input type="number" name="quantity" value="{{$item->quantity}}" max="{{$quan->quantity}}" min="1">
                                        @endforeach
                                        <input type="submit" name="update" value="update">
                                    </form>
                                </td>
                                <td>
                                    <div class="price-wrap"> <var name="prices">{{number_format($item->prices, 0, '.', '.')}}<sup>đ</sup></var> <small class="text-muted"></small> </div>
                                </td>
                                <td>
                                    <div>{{number_format((int)($item->quantity) * (int)($item->prices),0,'.', '.')}}<sup>đ</sup></div>
                                </td>
                                <td class="text-right d-none d-md-block">
                                    <form method="POST" action="{{url('/client/cart/'.$item->cart_id.'/delete')}}">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" onclick="return confirm('Bạn muốn xóa sản phẩm này?')">Xóa</button><br><br>
                                    </form>
                                </td>
                            </tr>
                            @php $total += (int)($item->quantity) * (int)($item->prices) @endphp
                            @endforeach
                            <tr>
                                @php $subtotal = $total @endphp
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Tổng giá: {{number_format($subtotal,0,'.', '.')}}<sup>đ</sup></b></td>
                            </tr>
                        </tbody1>
                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <form>
                        <div class="form-group"> <label>Nhập mã giảm giá nếu có</label>
                            <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Mã giảm giá">
                                <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                        </div>
                    </form>
                </div>
            </div>
                    <hr> <a href="{{url('client/orderDetail')}}" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Xác nhận hóa đơn </a>
                    <a href="{{url('client/home')}}" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Tiếp tục mua hàng</a>
        </aside>
    </div>
</div>
    </div>
@endif
@endsection
</body>
@include('sweetalert::alert')
</html>
