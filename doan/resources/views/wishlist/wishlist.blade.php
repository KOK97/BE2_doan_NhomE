@extends('layout')
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
@section('main-content')
    <!--====== App Content ======-->
    <div class="app-content">
        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">
            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="is-marked">
                                    <a href="{{ url('/wishlist') }}">Wishlist</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="section__heading u-c-secondary">Wishlist</h1>
                                    <form action="{{route('product.wishlist.search')}}" method="GET" class="form-inline">
                                        <div class="input-group">
                                            <input id="keyword" type="text" name="search" class="form-control"
                                                placeholder="Tìm sản phẩm theo tên">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit"><i
                                                        class="fas fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            @if (auth()->check())
                @if ($products != null && count($products) > 0)
                    <!--====== Section Content ======-->
                    <div class="section__content">
                        <div class="container">
                            @if (session('message'))
                                <div id="alert" class="alert alert-info" role="alert">{{ session('message') }}</div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @foreach ($products as $product)
                                        <!--====== Wishlist Product ======-->
                                        <div class="w-r u-s-m-b-30">
                                            <div class="w-r__container">
                                                <div class="w-r__wrap-1">
                                                    <div class="w-r__img-wrap">
                                                        <img class="u-img-fluid"
                                                            src="{{ asset('images/products/' . $product->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="w-r__info">
                                                        <span class="w-r__name">
                                                            <a href="product-detail.html">{{ $product->name }}</a>
                                                        </span>
                                                        @if ($product->reduced_price != $product->price)
                                                            <span class="w-r__price">{{ $product->reduced_price }} VND
                                                                <span class="w-r__discount">{{ $product->price }} VND</span>
                                                            </span>
                                                        @else
                                                            <span class="w-r__price">{{ $product->price }}VND
                                                                <span class="w-r__discount"></span>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <form action="{{ route('product.wishlist.destroy') }}" method="post">
                                                    <div class="w-r__wrap-2">
                                                        <a class="w-r__link btn--e-brand-b-2" data-modal="modal"
                                                            data-modal-id="#add-to-cart">ADD TO CART</a>
                                                        <a class="w-r__link btn--e-transparent-platinum-b-2"
                                                            href="">VIEW</a>
                                                        @csrf
                                                        <input type="hidden" name="wishlist_id"
                                                            value="{{ $product->wishlist_id }}">
                                                        <button class="w-r__link btn--e-transparent-platinum-b-2"
                                                            type="submit">REMOVE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--====== End - Wishlist Product ======-->
                                    @endforeach
                                    <div class="pagination-wrap">
                                        {{ $products->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="route-box">
                                        <div class="route-box__g">
                                            <a class="route-box__link" href="{{ route('Book Store') }}"><i
                                                    class="fas fa-long-arrow-alt-left"></i>
                                                <span>CONTINUE SHOPPING</span></a>
                                        </div>
                                        <form action="{{ route('product.wishlist.remove-all') }}" method="POST">
                                            @csrf
                                            <div class="route-box__g">
                                                <button type="submit" type="submit" class="route-box__link"><i
                                                        class="fas fa-trash"></i>
                                                    <span>CLEAR WISHLIST</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="section__intro u-s-m-b-60">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section__text-wrap">
                                        <h1 class="section__heading u-c-secondary">Danh sách trống</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="section__intro u-s-m-b-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">ĐĂNG NHẬP ĐỂ XEM DANH SÁCH YÊU THÍCH</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->
    <script>
        // Ẩn thông báo sau 10 giây
        setTimeout(function() {
            document.getElementById('alert').style.display = 'none';
        }, 10000); // 10 giây (10000 miligiây)
    </script>
@endsection
