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
                                    <a href="{{ route('Book Store') }}">Home</a>
                                </li>
                                <li class="is-marked">
                                    <a href="{{ route('auth.dashboard') }}">My Account</a>
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

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <!--====== Dashboard Features ======-->
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                    <div class="dash__pad-1">
                                        <span class="dash__text u-s-m-b-16">Hello, {{ $user->name }}</span>
                                        <ul class="dash__f-list">
                                            <li>
                                                <a href="{{ route('auth.dashboard') }}">Manage My
                                                    Account</a>
                                            </li>
                                            
                                            <li>
                                                <a href="{{ route('auth.profile') }}">My Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{route('diachi.view')}}">Address</a>
                                            </li>
                                            <li>
                                                <a href="{{route('lichsu-Order.view')}}">My Orders</a>
                                            </li>
                                            <li>
                                                <a class="dash-active" href="{{ route('auth.productrecent') }}">Product
                                                    recent</a>
                                            </li>
                                            @if (auth()->user()->role === 'admin')
                                                <li>
                                                    <a href="{{ route('admin.index') }}">Admin</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                    <div class="dash__pad-1">
                                        <ul class="dash__w-list">
                                            <li>
                                                <div class="dash__w-wrap">

                                                    <span class="dash__w-icon dash__w-icon-style-1"><i
                                                            class="fas fa-cart-arrow-down"></i></span>

                                                    <span class="dash__w-text">4</span>

                                                    <span class="dash__w-name">Orders Placed</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dash__w-wrap">

                                                    <span class="dash__w-icon dash__w-icon-style-3"><i
                                                            class="far fa-heart"></i></span>

                                                    <span class="dash__w-text">{{ $totalItems }}</span>

                                                    <span class="dash__w-name">Wishlist</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--====== End - Dashboard Features ======-->
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius">
                                        <h2 class="dash__h2 u-s-p-xy-20">Sản phẩm đã xem</h2>
                                        <div class="dash__table-wrap gl-scroll">
                                            <table class="dash__table">
                                                <thead>
                                                    <tr>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Price</th>
                                                        <th>Tác giả</th>
                                                        <th>Ngày xuất bản</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($recentProducts as $product)
                                                        <tr>
                                                            <td><a
                                                                    href="{{ route('show.detail', $product->id) }}">{{ $product->name }}</a>
                                                            </td>
                                                            <td>
                                                                <div class="dash__table-img-wrap">
                                                                    <img class="u-img-fluid"
                                                                        src="{{ asset('images/products/' . $product->image) }}"
                                                                        alt="{{ $product->name }}">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="dash__table-total">
                                                                    @if ($product->reduced_price != $product->price)
                                                                        <span>{{ $product->reduced_price }}</span>
                                                                        <div class="dash__link dash__link--brand">
                                                                            <del class="pd-detail__del">{{ $product->price }}
                                                                                VND</del>
                                                                        </div>
                                                                    @else
                                                                        <span>{{ $product->price }} VND</span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>{{ $product->author->author_name }}</td>
                                                            <td>{{ $product->publishing_year }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>
        <!--====== End - App Content ======-->
    @endsection
