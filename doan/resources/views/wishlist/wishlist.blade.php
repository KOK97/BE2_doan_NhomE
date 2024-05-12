@extends('layout')
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
                                <h1 class="section__heading u-c-secondary">Wishlist</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->
            @if (session('message'))
                <div id="alert" class="alert alert-info" role="alert">{{ session('message') }}</div>
            @endif

            @if (auth()->check())
                @if ($products != null && count($products) > 0)
                    <!--====== Section Content ======-->
                    <div class="section__content">
                        <div class="container">
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
                                                        <span class="w-r__category">
                                                            @php
                                                                $categories = explode(', ', $product->category_names);
                                                            @endphp
                                                            @foreach ($categories as $category)
                                                                <a href="shop-side-version-2.html">{{ $category }}</a>
                                                            @endforeach
                                                        </span>
                                                        <span class="w-r__price">{{ $product->price }} VND
                                                            @if (isset($product->sale))
                                                                <span class="w-r__discount">{{ $product->sale }}</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="w-r__wrap-2">
                                                    <a class="w-r__link btn--e-brand-b-2" data-modal="modal"
                                                        data-modal-id="#add-to-cart">ADD TO CART</a>
                                                    <a class="w-r__link btn--e-transparent-platinum-b-2"
                                                        href="product-detail.html">VIEW</a>
                                                    <a class="w-r__link btn--e-transparent-platinum-b-2"
                                                        href="#">REMOVE</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--====== End - Wishlist Product ======-->
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <div class="route-box">
                                        <div class="route-box__g">
                                            <a class="route-box__link" href="{{ route('Book Store') }}"><i
                                                    class="fas fa-long-arrow-alt-left"></i>
                                                <span>CONTINUE SHOPPING</span></a>
                                        </div>
                                        <div class="route-box__g">
                                            <a class="route-box__link" href="wishlist.html"><i class="fas fa-trash"></i>
                                                <span>CLEAR WISHLIST</span></a>
                                        </div>
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
