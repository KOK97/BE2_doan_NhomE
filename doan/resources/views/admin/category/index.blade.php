<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title')
    Trang Quan ly
@endsection
<!-- breadcrumb -->
@section('breadcrumb')
    Cateory
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
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('category.search') }}" method="GET" class="form-inline">
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
        @if (session('message'))
            <div id="alert" class="alert alert-info" role="alert">{{ session('message') }}</div>
        @endif
        <table class="table table-striped table-hover" style="text-align: center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center;">STT<button id="sortButton"><i
                                class="fa-solid fa-sort"></i></button></th>
                    <th scope="col" style="text-align: center;">Tên thể loại</th>
                    <th scope="col" style="text-align: center;">Mô tả</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($categories) && count($categories) > 0)
                    @foreach ($categories as $key => $category)
                        <tr>
                            <th scope="row" style="text-align: center;">{{ $startIndex + $key }}</th>
                            <td><a href="{{ route('category.edit', $category->id) }}"
                                    style="color: black;">{{ $category->category_name }}</a></td>
                            <td>
                                @if (strlen(strip_tags($category->category_description)) > 100)
                                    <?php
                                    $truncatedDescription = substr(strip_tags($category->category_description), 0, 100);
                                    $lastSpacePos = strrpos($truncatedDescription, ' ');
                                    echo substr($truncatedDescription, 0, $lastSpacePos) . ' ...';
                                    ?>
                                @else
                                    {{ strip_tags($category->category_description) }}
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-info"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <button class="btn btn-sm btn-danger delete-button"
                                        onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa-solid fa-trash"></i>
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Không tìm thấy thể loại</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary mr-3"><i class="fa-solid fa-user-plus"></i>
            Add Category</a>
        <div class="pagination-wrap">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
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

        $(document).ready(function() {
            // Loại bỏ các thẻ HTML khỏi nội dung mô tả
            $("td.description").each(function() {
                var text = $(this).html();
                var strippedText = text.replace(/<[^>]+>/g, '');
                $(this).html(strippedText);
            });
        });
    </script>
@endsection
