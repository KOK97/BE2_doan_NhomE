<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title')
    Trang Quan ly
@endsection
<!-- breadcrumb -->
@section('breadcrumb')
    Product
@endsection
<!-- content -->
@section('content')
    <div class="container">
        <form action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label for="name">Tên Sản Phẩm</label>
                        <input type="text" placeholder="Name" id="name" class="form-control" name="name" required
                            autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Mô tả Sản Phẩm</label>
                        <textarea class ="form-control" name="description" id="description" cols="30" rows="10"
                            placeholder="Input description"></textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Ảnh Sản Phẩm</label>
                        <input type="file" name="image" id="image" accept="image/*" class="form-control-file">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="category_id">Danh Mục Sản Phẩm</label>
                        <select placeholder="ID Category" name="category_id" id="category_id"
                            class="form-control custom-select">
                            <option disabled>Select one</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="price">Giá Sản Phẩm</label>
                        <input type="text" placeholder="Price" id="price" class="form-control" name="price"
                            required autofocus>
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="sale_id">Giảm giá</label>
                        <select class ="form-control custom-select" name="sale_id">
                            <option selected disabled>Select one</option>
                            @foreach ($sales as $sale)
                            <option value="{{$sale->id}}">{{$sale->discount}}%<p>-|{{$sale->sale_content}}|</p></option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mb-3">
                        <label for="author_id">Tác Giả</label>
                        <select class ="form-control custom-select" name="author_id">
                            <option selected disabled>Select one</option>
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->author_name}}<p>-|{{$author->pseudonym}}|</p></option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mb-3">
                        <label for="publishing_year">Năm Xuất Bản</label>
                        <input class ="form-control" name="publishing_year" id="publishing_year" type="text">
                        @if ($errors->has('publishing_year'))
                            <span class="text-danger">{{ $errors->first('publishing_year') }}</span>
                        @endif
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
