<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/info.css')}}">
    <title>Thông tin của bạn</title>
</head>
<body>

<form action="{{url('/client/'.$infos->id.'/edit')}}" method="POST">
    @csrf
    @method('PUT')
    <h1>Thay đổi thông tin</h1>
            <fieldset>
                <legend><span class="number">1</span> Thông tin của bạn</legend>

                <label for="name">Tên:</label>
                <input type="text" value="{{$infos->name}}" id="name" name="name" >

                <label for="mail">Email:</label>
                <input type="email" id="mail" value="{{$infos->email}}" name="email" >

                <label for="phonenumber">Số điện thoại:</label>
                <input type="number" id="phone" value="{{$infos->phone}}" name="phone" >

                <label>Địa chỉ:</label>
                <select name="address">
                    <option>Miền Bắc</option>
                    <option>Miền Nam</option>
                    <option>Miền Trung</option>
                </select>
            </fieldset>
    <button type="submit">Xác nhận</button>
</form>
<form>
            <a href="{{url('client/home')}}">Trở về</a>
</form>

</body>
</html>
