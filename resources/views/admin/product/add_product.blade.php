@extends('layouts.admin_base')

@section('content')
    <h1 style="">Add product</h1>
    <form action="{{url('admin/product/add_product')}}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label class="form-label">Product_Id</label>
            <input class="form-control" name="product_id" placeholder="Enter product ID">
        </div>
        <div class="mb-3">
            <label class="form-label">Image_URL</label>
            <input class="form-control" name="url" placeholder="Enter image URL">
        </div>
        <div class="mb-3">
            <label class="form-label">Category_Name</label>
            <select class="form-control" name="cate_id" >
                @foreach($category as $cate)
                    <option value="{{ $cate->cate_id }}">{{ $cate->cate_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Name</label>
            <input class="form-control" name="product_name" placeholder="Enter product name">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Price</label>
            <input type="number" class="form-control" name="prices" placeholder="Enter prices">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Code</label>
            <input class="form-control" name="product_code" placeholder="Enter product Code">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="Enter product quantity">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Info</label>
            <textarea class="form-control" name="product_info" id="editor" placeholder="Enter product Info"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Info Detail</label>
            <textarea class="form-control" name="info_dt" id="editorr" placeholder="Enter product Info detail"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Confirm Add</button>
    </form>
@endsection

@section('js')
    @parent
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editorr' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
