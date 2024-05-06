<style>
    .pagination>.active>a,
    .pagination>.active>a:focus,
    .pagination>.active>a:hover,
    .pagination>.active>span,
    .pagination>.active>span:focus,
    .pagination>.active>span:hover {
        background-color: #3b4952;
        border-color: #3b4952;
    }

    .pagination>li>a,
    .pagination>li>span {
        color: #2c3840;
        margin: 0px 5px;
        border-radius: 3px;
        -webkit-box-shadow: 0px 1px 3px 0px rgba(44, 56, 64, 0.2);
        -moz-box-shadow: 0px 1px 3px 0px rgba(44, 56, 64, 0.2);
        box-shadow: 0px 1px 3px 0px rgba(44, 56, 64, 0.2);
        border: none;
        font-size: 16px;
    }

    .pagination>li>a:focus,
    .pagination>li>a:hover,
    .pagination>li>span:focus,
    .pagination>li>span:hover {
        background-color: #e74c3c;
        border-color: #e74c3c;
        color: #fff;
    }

    .pagination {
        margin: 20px 0;
    }

    .pagination a,
    .pagination span {
        color: #333;
        border-radius: 3px;
        padding: 5px 10px;
        margin: 0 2px;
        text-decoration: none;
        border: 1px solid #ccc;
    }

    .pagination a:hover,
    .pagination a:focus,
    .pagination span:hover,
    .pagination span:focus {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination-wrap {
        width: 100%;
        float: left;
        margin-bottom: 35px;
    }
</style>
<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title') Trang Quan ly @endsection
<!-- breadcrumb -->
@section('breadcrumb') Cateory @endsection
<!-- content -->
@section('content')
<div class="container">
    @if(session('success'))
    <div id="alert" class="alert alert-primary" role="alert">{{ session('success') }}</div>
    @endif
    @if(session('destroy'))
    <div id="alert" class="alert alert-danger" role="alert">{{ session('destroy') }}</div>
    @endif
    @if(session('update'))
    <div id="alert" class="alert alert-info" role="alert">{{ session('update') }}</div>
    @endif
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('category.search') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input id="keyword" type="text" name="search" class="form-control" placeholder="Tìm theo thể loại">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(session('message'))
    <div id="alert" class="alert alert-info" role="alert">{{ session('message') }}</div>
    @endif
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" style="text-align: center;">STT<button id="sortButton"><i class="fa-solid fa-sort"></i></button></th>
                <th scope="col" style="text-align: center;">Tên thể loại</th>
                <th scope="col" style="text-align: center;">Mô tả</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($categories) && count($categories) > 0)
            @foreach($categories as $key => $category)
            <tr>
                <th scope="row" style="text-align: center;">{{ ++$key }}</th>
                <td><a href="{{ route('category.edit', $category->id) }}" style="color: black;">{{ $category->category_name }}</a></td>
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
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <button class="btn btn-sm btn-danger delete-button"><i class="fa-solid fa-trash"></i> Delete</button>
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
    <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary mr-3"><i class="fa-solid fa-user-plus"></i> Add Category</a>
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