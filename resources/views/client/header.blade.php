<html>
<header>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <div class="logo">
        <img width="50px" src="{{asset('images/logo3.png')}}" href="{{url('/client/home')}}">
    </div>
    <div class="menu">
        <li><a href="{{url('/client/home')}}">Trang chủ</a></li>
        <li><a href="{{url('/client/category/mass')}}">Sữa tăng cân</a>
{{--            <ul class="sub-menu">--}}
{{--                <li><a href="">Tăng cân nhanh</a></li>--}}
{{--                <li><a href="">Tăng cân nạc</a></li>--}}
{{--            </ul>--}}
        </li>
        <li><a href="{{url('/client/category/whey')}}">Whey Protein</a>
{{--            <ul class="sub-menu">--}}
{{--                <li><a href="">Whey Protein Blend</a></li>--}}
{{--                <li><a href="">Whey Protein Isolate</a></li>--}}
{{--                <li><a href="">Hydrolyzed Whey</a></li>--}}
{{--                <li><a href="">Casein Protein</a></li>--}}
{{--                <li><a href="">Meal Replacement</a></li>--}}
{{--            </ul>--}}
        </li>
        <li><a href="{{url('/client/category/BCAAsEAAs')}}">BCAAs, EAAs</a></li>
        <li><a href="{{url('/client/category/PreworkoutCreatine')}}">Pre-Workout,Creatine</a>
{{--            <ul class="sub-menu">--}}
{{--                <li><a href="">Pre-Workout</a></li>--}}
{{--                <li><a href="">Pre & Giảm mỡ</a></li>--}}
{{--                <li><a href="">Creatine</a></li>--}}
{{--                <li><a href="">Đơn chất</a></li>--}}
{{--            </ul>--}}
        </li>
        <li><a href="{{url('/client/category/vitamin')}}">Vitamin,khoáng chất</a>
{{--            <ul class="sub-menu">--}}
{{--                <li><a href="">Bổ sung Vitamin</a></li>--}}
{{--                <li><a href="">Tăng Testosterone</a></li>--}}
{{--                <li><a href="">Bổ sung dầu cá</a></li>--}}
{{--            </ul>--}}
        </li>
        <li><a href="{{url('/client/category/burnFat')}}">Giảm mỡ</a>
{{--            <ul class="sub-menu">--}}
{{--                <li><a href="">Sinh nhiệt đốt mỡ</a></li>--}}
{{--                <li><a href="">Ít chất kích thích</a></li>--}}
{{--            </ul>--}}
        </li>
    </div>
    <div class="others">
        <form action="{{url('client/home/search')}}" method="get">
{{--            {{csrf_field()}}--}}
            <li><input name="keyword_submit" placeholder="Tìm kiếm" type="text"> <i class="fa fa-search"></i></li>
        </form>
        @if(Auth::check() == false)
            <div class="dangnhap-dangki">
                <a href="/login" class="dang-nhap"> Đăng nhập /</a>
                <a href="/register" class="dang-ki"> Đăng ký </a>
                @else
                    <li class="dangnhap-dangki">
                        @if(Auth::id()==0)
                            <button class="fa fa-user" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form action="{{url('login')}}" method="POST">
                                    @csrf
                                    &nbsp;&nbsp;<button class="fa fa-sign-in"> Login</button>
                                </form>
                            </div>
                        @else
                            <button class="fa fa-user" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form action="{{url('client/info')}}" method="get">
                                    @csrf
                                    &nbsp;&nbsp;<button class="fa fa-info-circle"> Thông tin</button>
                                </form>
                                <form action="{{url('client/clientOrder')}}" method="GET">
                                    @csrf
                                    &nbsp;
                                    <button class="fa fa-bookmark"> Lịch sử đơn hàng</button>
                                </form>
                                <form action="{{url('logout')}}" method="POST">
                                    @csrf
                                    &nbsp;&nbsp;<button class="fa fa-sign-out"> Đăng xuất</button>
                                </form>
                            </div>
                    <li> <a class="fa fa-shopping-cart" href="{{url('client/cartList')}}"></a></li>
                @endif
            </div>
            </div>
        @endif
    </div>
</header>
@include('sweetalert::alert')
</html>
