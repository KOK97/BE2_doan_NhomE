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
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('admin.product.search') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input id="keyword" type="text" name="search" class="form-control"
                            placeholder="Tìm theo thể loại">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-search"></i>
                                Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (session('success'))
            <div id="alert" class="alert alert-primary" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('destroy'))
            <div id="alert" class="alert alert-danger" role="alert">{{ session('destroy') }}</div>
        @endif
        @if (session('update'))
            <div id="alert" class="alert alert-info" role="alert">{{ session('update') }}</div>
        @endif
        <table class="table table-striped table-hover" style="text-align: center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Giá ưu đãi</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Ngày xuất bản</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($products) && count($products) > 0)
                    @foreach ($products as $key => $product)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td><a href="{{ route('getdataeditProduct', $product->id) }}"
                                    style="color: black;">{{ $product->name }}</a>
                            </td>
                            <td>
                                <img class="img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                    width="50px"class="img-thumbnail" alt="">
                            </td>
                            <td>
                                @if (strlen(strip_tags($product->description)) > 100)
                                    <?php
                                    $truncatedDescription = substr(strip_tags($product->description), 0, 100);
                                    $lastSpacePos = strrpos($truncatedDescription, ' ');
                                    echo substr($truncatedDescription, 0, $lastSpacePos) . ' ...';
                                    ?>
                                @else
                                    {{ strip_tags($product->description) }}
                                @endif

                            </td>
                            <td>{{ $product->reduced_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->author->author_name }}</td>
                            <td>{{ $product->publishing_year }}</td>
                            <td>
                                @foreach ($product->categories as $category)
                                    {{ $category->category_name }},
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('destroyProduct', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('getdataeditProduct', $product->id) }}"
                                        class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button onclick="confirmDelete()" class="btn btn-sm btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">Không tìm thấy sản phẩm nào trong cơ sở dữ liệu</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="pagination-wrap">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
        <a href="{{ route('createProduct') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus nav-icon"></i><i
                class="fa-solid fa-box nav-icon"></i></a>

    </div>
    <script>
        function confirmDelete() {
            var result = confirm("Bạn có chắc muốn xóa?");
            if (result) {
                document.getElementById("deleteForm").submit();
            } else {}
        }
        // Ẩn thông báo sau 10 giây
        setTimeout(function() {
            document.getElementById('alert').style.display = 'none';
        }, 10000); // 10 giây (10000 miligiây)
    </script>
@endsection
