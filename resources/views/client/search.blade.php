@extends('layouts.base')
@section('title',"Kết quả tìm kiếm")

@section('content')
    @include('client.header')
    <section class="category">
        <div class="container">
            <div class="category-top row">
                <p><a href="{{url('/client/home')}}">Trang chủ</a></p> <span>&#10230; </span> <p>Kết quả tìm kiếm </p><span>&#10230; </span> <p>@php
                        echo ($_GET['keyword_submit']);
                    @endphp</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @include('client.categoryLeft')
                <div class="category-right ">
                    <div class="category-right-top-item">
                        <p><a>Kết quả tìm kiếm:
                                @php
                                    echo ($_GET['keyword_submit']);
                                @endphp
                            </a> </p>
                    </div>
                    <div class="category-right-top-item">

                        <a>Sắp xếp theo:</a>
                        <a href="{{url('/client/home/search')."?keyword_submit=".$_GET['keyword_submit']."&sort=price_desc"}}" >Giá cao đến thấp</a>
                        <a>|</a>
                        <a href="{{url('/client/home/search')."?keyword_submit=".$_GET['keyword_submit']."&sort=price_asc"}}"> Giá thấp đến cao</a>
                    </div>

                    <div class="category-right-content row">
                        @forelse($search_product as $product)
                            <div class="category-right-content-item">
                                <img src="{{$product-> url}}" href="#"/>
                                <h1>{{$product-> product_name}}</h1>
                                <p>{{number_format($product->prices, 0, '.', '.')}}<sup>đ</sup></p>
                                <a class="read_more mar_top" href="{{url('/client/home/product/'.$product->product_id.'/'.$product->cate_id)}}"> Mua ngay</a>
                            </div>
                        @empty
                            <p>Danh sach rong</p>
                        @endforelse
                    </div>

                    <div class="category-right-bottom row">
{{--                        <div class="category-right-bottom-items">--}}
{{--                            <p>Hiển thị 2 <span>|</span>4 sản phẩm</p>--}}
{{--                        </div>--}}
                        <div class="category-right-bottom-items">
                            {!!$search_product->appends(['keyword_submit'=>$_GET['keyword_submit']])->links("pagination::bootstrap-4")  !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection
