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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($categories))
                @foreach($categories as $key => $category)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <form action="{{route('category.destroy', $category->id)}}" method="post">
                                @csrf
                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button onclick="confirmDelete()" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>  
                @endforeach
            @endif
        </tbody>
    </table>
    <a href="{{route('category.create')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-user-plus"></i></a>
</div>
<script>
    function confirmDelete() {
            var result = confirm("Bạn có chắc muốn xóa?");
            if (result) {
                document.getElementById("deleteForm").submit();
            } else {
            }
        }
    // Ẩn thông báo sau 10 giây
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 10000); // 10 giây (10000 miligiây)
</script>
@endsection