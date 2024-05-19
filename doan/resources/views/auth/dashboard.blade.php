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
                                                <a class="dash-active" href="{{ route('auth.dashboard') }}">Manage My
                                                    Account</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('auth.profile') }}">My Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('diachi.view') }}">Address</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('lichsu-Order.view') }}">My Orders</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('auth.productrecent') }}">Product recent</a>
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
                                                    @if (!empty($totalItems))
                                                        <span class="dash__w-text">{{ $totalItems }}</span>
                                                    @else
                                                        <span class="dash__w-text">0</span>
                                                    @endif
                                                    <span class="dash__w-name">Wishlist</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--====== End - Dashboard Features ======-->
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>
                                        <div class="row">
                                            <div class="col-lg-6 u-s-m-b-30">
                                                <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                    <div class="dash__pad-3">
                                                        <h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>
                                                        <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                            <a href="dash-edit-profile.html">Edit</a>
                                                        </div>
                                                        <span class="dash__text">{{ $user->name }}</span>
                                                        <span class="dash__text">{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 u-s-m-b-30">
                                                <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                    <div class="dash__pad-3">
                                                        <h2 class="dash__h2 u-s-m-b-8">ADDRESS BOOK</h2>
                                                        <span class="dash__text-2 u-s-m-b-8">Default Shipping Address</span>
                                                        <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                            <a href="dash-address-book.html">Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
