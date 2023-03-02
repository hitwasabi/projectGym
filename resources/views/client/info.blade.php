<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/info.css')}}">
    <title>Your Info</title>
</head>
<body>
<form>

    <h1>Thông tin</h1>
    @foreach($infos as $info)
        @if(Auth::id()==($info->id))
    <fieldset>

        <legend><span class="number">1</span> Thông tin của bạn</legend>

        <label for="name">Tên:</label>
        <input type="text" value="{{$info->name}}" id="name" name="user_name" readonly>

        <label for="mail">Email:</label>
        <input type="email" id="mail" value="{{$info->email}}" name="user_email" readonly>

        <label for="phonenumber">Số điện thoại:</label>
        <input type="number" id="phone" value="{{$info->phone}}" name="phone" readonly>

        <label>Địa chỉ:</label>
        <input type="text" id="address" value="{{$info->address}}" name="address" readonly>

        <a href="{{url('/client/'.$info->id.'/edit')}}">Chỉnh sửa hồ sơ</a>
        @endif
        @endforeach
    </fieldset>
</form>
<form>
    <fieldset>

        <legend><span class="number">2</span> Bạn có muốn</legend>

    </fieldset>
    <a href="{{url('client/home')}}">Về trang chủ</a>

</form>
</body>
</html>
