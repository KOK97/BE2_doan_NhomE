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
        <form action="{{ route('saveSale') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-6">
                        <label for="discount">Mức Giảm</label>
                        <input type="text" placeholder="Discount" id="discount" class="form-control"
                            name="discount" required autofocus>
                        @if ($errors->has('discount'))
                            <span class="text-danger">{{ $errors->first('discount') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-6">
                        <label for="sale_content">Nội Dung Giảm</label>
                        <input type="text" placeholder="Sale Content" id="sale_content" class="form-control"
                            name="sale_content" required autofocus>
                        @if ($errors->has('sale_content'))
                            <span class="text-danger">{{ $errors->first('sale_content') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
