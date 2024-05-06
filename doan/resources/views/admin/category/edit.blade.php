<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title') Trang Quan ly @endsection
<!-- breadcrumb -->
@section('breadcrumb') User @endsection
<!-- content -->
@section('content')
<div class="container">
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ip_name">Category name</label>
            <input type="text" class="form-control" name="category_name" id="ip_name" value="{{ $category->category_name }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
    </form>
</div>
@endsection