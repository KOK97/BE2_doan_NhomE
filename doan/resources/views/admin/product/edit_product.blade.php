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
        <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group mb-3">
                        <label for="name">Tên Sản Phẩm</label>
                        <input type="text" placeholder="Name" id="name" class="form-control" name="name" autofocus
                            value="{{ $product->name }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Mô tả Sản Phẩm</label>
                        <textarea class ="form-control" name="description" id="description" cols="30" rows="10"
                            placeholder="Input description">{{ $product->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="price">Giá Sản Phẩm</label>
                        <input type="text" placeholder="Price" id="price" class="form-control" name="price"
                            autofocus value="{{ $product->price }}">
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="sale_id">Giảm giá</label>
                        <select class ="form-control custom-select" name="sale_id">
                            <option selected disabled>Select one</option>
                            @foreach ($sales as $sale)
                                <option value="{{ $sale->id }}" {{ $sale->id == $product->sale_id ? 'selected' : '' }}>
                                    {{ $sale->discount }}%</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mb-3">
                        <label for="author_id">Tác Giả</label>
                        <select class ="form-control custom-select" name="author_id">
                            <option selected disabled>Select one</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}"
                                    {{ $author->id == $product->author_id ? 'selected' : '' }}>
                                    {{ $author->author_name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mb-3">
                        <label for="publishing_year">Năm Xuất Bản</label>
                        <input class ="form-control" name="publishing_year" id="publishing_year" type="text"
                            value="{{ $product->publishing_year }}">
                        @if ($errors->has('publishing_year'))
                            <span class="text-danger">{{ $errors->first('publishing_year') }}</span>
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
                <div class="col-md-2">
                    <div class="form-group mb-2">
                        <label for="category_id">Danh Mục Sản Phẩm</label>
                        @foreach ($categories as $category)
                            <div class="form-check">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    id="category_{{ $category->id }}" class="form-check-input"
                                    {{ in_array($category->id, $categorySelect->toArray()) ? 'checked' : '' }}>
                                <label for="category_{{ $category->id }}"
                                    class="form-check-label">{{ $category->category_name }}</label>
                            </div>
                        @endforeach
                        @if ($errors->has('categories'))
                            <span class="text-danger">{{ $errors->first('categories') }}</span>
                        @endif

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
        </form>
    </div>
@endsection
