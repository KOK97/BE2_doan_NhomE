<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title') Trang Quan ly @endsection
<!-- breadcrumb -->
@section('breadcrumb') User @endsection
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
            <form action="{{ route('user.search') }}" method="GET" class="form-inline">
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
    <table class="table table table-striped table-hover">
        <thead class="thead-dark" style="text-align: center;">
            <tr>
                <th scope="col">STT<button class="mx-2" id="sortButton"><i class="fa-solid fa-sort"></i></button></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Avatar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users))
            @foreach($users as $key => $user)
            <tr>
                <th scope="row" style="text-align: center;">{{ $startIndex + $key }}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <img src="{{ asset('images/users/' . $user->avatar) }}" width="50px" class="img-thumbnail" alt="avatar">
                </td>
                <td>
                    <form action="{{route('user.destroy', $user->id)}}" method="post">
                        @csrf
                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button onclick="confirmDelete()" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <a href="{{route('user.create')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-user-plus"></i></a>
    <div class="pagination-wrap">
        {{ $users->links('pagination::bootstrap-5') }}
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

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("sortButton").addEventListener("click", function() {
            sortTable();
        });
    });

    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector(".table");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.getElementsByTagName("tr");
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("th")[0];
                y = rows[i + 1].getElementsByTagName("th")[0];
                if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>
@endsection