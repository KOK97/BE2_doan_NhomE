<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title')
    Trang Quan ly
@endsection
<!-- breadcrumb -->
@section('breadcrumb')
    Author
@endsection
<!-- content -->
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('author.search') }}" method="GET" class="form-inline">
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
                    <th scope="col">Tên tác giả</th>
                    <th scope="col">Bút danh tác giả</th>
                    <th scope="col">Năm sinh tác giả</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($authors) && count($authors) > 0)
                    @foreach ($authors as $key => $author)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td><a href="{{ route('getDataEditAuthor', $author->id) }}"
                                    style="color: black;">{{ $author->author_name }}</a>
                            </td>
                            <td style="text-align: center">
                                {{ $author->pseudonym }}
                            </td>
                            <td style="text-align: center">
                                {{ $author->year_of_birth }}
                            </td>
                            <td>
                                <form action="{{ route('destroyAuthor', $author->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('getDataEditAuthor', $author->id) }}" class="btn btn-sm btn-info"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button onclick="confirmDelete()" class="btn btn-sm btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Không tìm thấy tác giả nào trong cơ sở dữ liệu</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="pagination-wrap">
            {{ $authors->links('pagination::bootstrap-5') }}
        </div>
        <a href="{{ route('createAuthor') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus nav-icon"></i><i
                class="fa-solid fa-at nav-icon"></i></a>

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