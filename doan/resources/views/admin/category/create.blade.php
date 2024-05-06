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
            <label for="ip_name">Category name</label>
            <input type="text" class="form-control" name="category_name" id="ip_name" placeholder="Enter name">
            @if($errors->has('category_name'))
            <span style="color: red;">{{ $errors->first('category_name') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection