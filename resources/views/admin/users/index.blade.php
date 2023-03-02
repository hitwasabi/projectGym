@extends('layouts.admin_base')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{asset('css/userAdmin.css')}}">
</head>
<body>
    <h1 class="fas fa-user"> All user</h1>
    <div class="container mt-5 mb-3">
        @foreach($users as $user)
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                        <div class="ms-2 c-details">
                            <h4 class="mb-0">{{$user->name}}</h4>
                        </div>
                    </div>
                    <div class="badge"> <span>User</span> </div>
                </div>
                <div class="mt-5">
                    <h3 class="heading">{{$user->email}}<br>{{$user->phone}}</h3>
                </div>
                <div>
                    <a href="{{url('admin/users/orderDetail')}}">Check Orders</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
@endsection
