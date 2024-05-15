<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title')
    Trang Quan ly
@endsection
<!-- breadcrumb -->
@section('breadcrumb')
    Sale
@endsection
<!-- content -->
@section('content')
    <div class="container">
        <form action="{{ route('updateSale', $sale->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">

                    <div class="form-group mb-3">
                        <label for="discount">Mức giảm</label>
                        <input type="text" placeholder="discount" id="discount" class="form-control" name="discount"
                             autofocus value="{{ $sale->discount }}">
                        @if ($errors->has('discount'))
                            <span class="text-danger">{{ $errors->first('discount') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="sale_content">Nội dung giảm</label>
                        <input type="text" placeholder="Sale Content" id="sale_content" class="form-control"
                            name="sale_content"  autofocus value="{{ $sale->sale_content }}">
                        @if ($errors->has('sale_content'))
                            <span class="text-danger">{{ $errors->first('sale_content') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
        </form>
    </div>
@endsection
