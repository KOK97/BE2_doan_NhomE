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
        <form action="{{ route('saveAuthor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-6">
                        <label for="author_name">Author Name</label>
                        <input type="text" placeholder="Author Name" id="author_name" class="form-control"
                            name="author_name"  autofocus>
                        @if ($errors->has('author_name'))
                            <span class="text-danger">{{ $errors->first('author_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-6">
                        <label for="pseudonym">Pseudonym</label>
                        <input type="text" placeholder="Pseudonym" id="pseudonym" class="form-control"
                            name="pseudonym" autofocus>
                        @if ($errors->has('pseudonym'))
                            <span class="text-danger">{{ $errors->first('pseudonym') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-6">
                        <label for="year_of_birth">Year of Birth</label>
                        <input type="text" placeholder="Year of Birth" id="year_of_birth" class="form-control"
                            name="year_of_birth"  autofocus>
                        @if ($errors->has('year_of_birth'))
                            <span class="text-danger">{{ $errors->first('year_of_birth') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
