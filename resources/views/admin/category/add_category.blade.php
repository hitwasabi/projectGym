@extends('layouts.admin_base')

@section('content')
    <h1 style="">Add Category</h1>
    <form method="POST" action="{{url('admin/category/add_category')}}">
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Category_Id</label>
            <input class="form-control" name="cate_id" placeholder="Enter ID">
        </div>
        <div class="mb-3">
            <label class="form-label">Category_Name</label>
            <input class="form-control" name="cate_name" placeholder="Enter name">
        </div>
        <button type="submit" class="btn btn-primary">Confirm Add</button>
    </form>
@endsection

