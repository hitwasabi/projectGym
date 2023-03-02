@extends('layouts.admin_base')

@section('content')
    <h1 style="">Edit Category</h1>
    <form method="POST" action="{{url('admin/category/'.$categories->cate_id.'/edit')}}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Category_Id</label>
            <input class="form-control" name="cate_id" value="{{$categories->cate_id}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Category_Name</label>
            <input class="form-control" name="cate_name" value="{{$categories->cate_name}}" placeholder="Enter name">
        </div>
        <button type="submit" class="btn btn-primary">Confirm Update</button>
    </form>
@endsection
