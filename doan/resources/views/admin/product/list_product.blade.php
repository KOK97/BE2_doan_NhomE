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
        @if (session('success'))
            <div id="alert" class="alert alert-primary" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('destroy'))
            <div id="alert" class="alert alert-danger" role="alert">{{ session('destroy') }}</div>
        @endif
        @if (session('update'))
            <div id="alert" class="alert alert-info" role="alert">{{ session('update') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Author</th>
                    <th>Sale</th>
                    <th>Publication date</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($products))
                    @foreach ($products as $key => $product)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $product->name }}</td>
                            <td>
                                <img src="{{ asset('images/products/' . $product->image) }}"
                                    width="50px"class="img-thumbnail" alt="avatar">
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->author }}</td>
                            <td>{{ $product->sale }}</td>
                            <td>{{ $product->publication_date }}</td>
                            <td>
                                <form action="{{ route('destroyProduct', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('getdataedit', $product->id) }}" class="btn btn-sm btn-info"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button onclick="confirmDelete()" class="btn btn-sm btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
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
