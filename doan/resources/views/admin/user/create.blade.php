<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title') Trang Quan ly @endsection
<!-- breadcrumb -->
@section('breadcrumb') User @endsection
<!-- content -->
@section('content')
<div class="container">
    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ip_name">Username</label>
            <input type="text" class="form-control" name="name" id="ip_name" placeholder="Enter username">
            @if ($errors->has('name'))
            <span style="color: red;">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="ip_email">Email</label>
            <input type="email" class="form-control" name="email" id="ip_email" placeholder="Enter email">
            @if ($errors->has('email'))
            <span style="color: red;">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="ip_phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="ip_phone" placeholder="Enter phone">
            @if ($errors->has('phone'))
            <span style="color: red;">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="ip_password">Password</label>
            <input type="password" class="form-control" name="password" id="ip_password" placeholder="Enter password">
            @if ($errors->has('password'))
            <span style="color: red;">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="ip_avatar">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                    @if ($errors->has('avatar'))
                    <span style="color: red;">{{ $errors->first('avatar') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <label for="ip_avatar">Role</label>
                <select class="form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                </select>
                @if ($errors->has('avatar'))
                <span style="color: red;">{{ $errors->first('avatar') }}</span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection