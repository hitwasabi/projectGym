@extends('layouts.admin_base')

@section('content')
    <h1 style="">Edit product</h1>
    <form action="{{url('admin/product/'.$products->product_id).'/edit'}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Product_Id</label>
            <input class="form-control" name="product_id" value="{{$products->product_id}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Image_URL</label>
            <input class="form-control" name="url" value="{{$products->url}}" placeholder="Enter image URL">
        </div>
        <div class="mb-3">
            <label class="form-label">Category_Name</label>
            <select name="cate_id">
                @foreach($category as $cate)
                    <option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Name</label>
            <input class="form-control" name="product_name" value="{{$products->product_name}}" placeholder="Enter product name">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Price</label>
            <input type="number" class="form-control" name="prices" value="{{$products->prices}}" placeholder="Enter prices" min="1">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Code</label>
            <input class="form-control" name="product_code" value="{{$products->product_code}}" placeholder="Enter product Code">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Quantity</label>
            <input type="number" class="form-control" name="quantity" value="{{$products->quantity}}" placeholder="Enter product Code">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Info</label>
            <textarea class="form-control" name="product_info" id="editor" value="{{$products->product_info}}" placeholder="Enter product Info"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Info Detail</label>
            <textarea class="form-control" name="info_dt" id="editorr" value="{{$products->info_dt}}" placeholder="Enter product Info detail"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Confirm Update</button>
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
