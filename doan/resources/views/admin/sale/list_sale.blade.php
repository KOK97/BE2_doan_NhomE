<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title')
    Trang Quan ly
@endsection
<!-- breadcrumb -->
@section('breadcrumb')
    Sale
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
        <table class="table table-striped table-hover" style="text-align: center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mức giảm giá</th>
                    <th scope="col">Nội dung giảm giá</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($sales) && count($sales) > 0)
                    @foreach ($sales as $key => $sale)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td><a href="{{ route('getdataeditSale', $sale->id) }}"
                                    style="color: black;">{{ $sale->discount }}%</a>
                            </td>
                            <td>{{ $sale->sale_content }}</td>
                            <td>
                                <form action="{{ route('destroySale', $sale->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('getdataeditSale', $sale->id) }}" class="btn btn-sm btn-info"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button onclick="confirmDelete()" class="btn btn-sm btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Không tìm thấy giảm giá nào trong cơ sở dữ liệu</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="pagination-wrap">
            {{ $sales->links('pagination::bootstrap-5') }}
        </div>
        <a href="{{ route('createSale') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus nav-icon"></i><i
                class="fa-solid fa-percent nav-icon"></i></a>

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
