@extends('layouts.admin_base')

@section('content')
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product</title>
</head>
<body>
<h1>Category</h1>
<br>
<table>
    <th>
<a href="{{url('admin/category/add_category')}}">
    <button type="button" class="btn btn-primary btn-lg" class="fa fa-plus">Add category</button>
</a>
</th>
<th></th>
<th></th>
<th></th>
<th>
<form action="{{url('admin/category/search')}}" method="get">
    <input name="keyword_submit" placeholder="Tìm kiếm" type="text"><i class="fa fa-search" style="padding-left: 10px"></i>
</form>
</th>
</table>
<br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Category_Id</th>
        <th scope="col">Category_Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($categories as $cate)
        <tr>
            <th scope="row">{{$cate->cate_id}}</th>
            <td>{{$cate->cate_name}}</td>
            <td>
                <div class="action d-flex flex-row">
                    <a href="{{url('/admin/category/'.$cate->cate_id.'/edit')}}">Edit</a>&nbsp;
                    <form method="POST" action="{{url('/admin/category/'.$cate->cate_id.'/delete')}}">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Category will move to trash! Do you still want to delete?')"
                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
@endsection
