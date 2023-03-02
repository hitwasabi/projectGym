@extends('layouts.base')
@section('title',"BCAAs, EAAs")

@section('content')
    @include('client.header')
    <!-------------------category-------------------->
    <section class="category">
        <div class="container">
            <div class="category-top row">
                <p><a href="{{url('/client/home')}}">Trang chủ</a></p> <span>&#10230; </span> <p><a href="{{url('/client/category/BCAAsEAAs')}}">BCAAs EAAs</a></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @include('client.categoryLeft')
                <div class="category-right ">
                    <div class="category-right-top-item">
                        <p><a href="{{url('/client/category/BCAAsEAAs')}}">BCAAs EAAs</a></p>
                    </div>
                    <div class="category-right-top-item">
                        <a>Sắp xếp theo:</a>
                        <a href="{{URL::current()."?sort=price_desc"}}">Giá cao đến thấp</a>
                        <a>|</a>
                        <a href="{{URL::current()."?sort=price_asc"}}"> Giá thấp đến cao</a>
                    </div>

                    <div class="category-right-content row">
                        @forelse($products as $product)
                            <div class="category-right-content-item">
                                <img src="{{$product-> url}}" href="#"/>
                                <h1>{{$product-> product_name}}</h1>
                                <p>{{number_format($product->prices, 0, '.', '.')}}<sup>đ</sup></p>
                                <a class="read_more mar_top" href="{{url('/client/home/product/'.$product->product_id.'/'.$product->cate_id)}}"> Mua ngay</a>
                            </div>
                        @empty
                            <p>Danh sách rỗng</p>
                        @endforelse
                    </div>

                    <div class="category-right-bottom row">
                        {{--                        <div class="category-right-bottom-items">--}}
                        {{--                            <p>Hiển thị 2 <span>|</span>4 sản phẩm</p>--}}
                        {{--                        </div>--}}
                        <div class="category-right-bottom-items">
                            <p><span></span>{{$products->links("pagination::bootstrap-4")}}<span></span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection








