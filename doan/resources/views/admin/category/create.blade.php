<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title') Trang Quan ly @endsection
<!-- breadcrumb -->
@section('breadcrumb') Category @endsection
<!-- content -->
@section('content')
<div class="container">
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ip_name">Tên thể loại </label>
            <input type="text" class="form-control" name="category_name" id="ip_name" placeholder="Nhập tên">
            @if($errors->has('category_name'))
            <span style="color: red;">{{ $errors->first('category_name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="ip_name">Mô tả</label>
            <textarea type="text" class="form-control" name="category_description" id="ip_description" placeholder="Nhập mô tả"></textarea>
            @if($errors->has('category_description'))
            <span style="color: red;">{{ $errors->first('category_description') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection