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
            <label for="ip_name">Tên thể loại</label>
            <input type="text" class="form-control" name="category_name" id="ip_name" value="{{ $category->category_name }}">
            @if($errors->has('category_name'))
            <span style="color: red;">{{ $errors->first('category_name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="ip_name">Mô tả</label>
            <textarea type="text" class="form-control" name="category_description" id="ip_description">{{$category->category_description}}</textarea>
            @if($errors->has('category_description'))
            <span style="color: red;">{{ $errors->first('category_description') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
    </form>
</div>
@endsection