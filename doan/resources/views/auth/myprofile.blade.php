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
                                    <a href="{{ route('auth.profile') }}">My Account</a>
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
                                                <a href="{{ route('auth.dashboard') }}">Manage My Account</a>
                                            </li>
                                            <li>
                                                <a class="dash-active" href="{{ route('auth.profile') }}">My Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{route('diachi.view')}}">Address</a>
                                            </li>
                                            <li>
                                                <a href="{{route('lichsu-Order.view')}} ">My Orders</a>
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
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">My Profile</h1>
                                        <span class="dash__text u-s-m-b-30">Look at all your info, you can customize your
                                            profile.</span>
                                        <div class="row">
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8" style="text-align: center">Avatar</h2>
                                                <img src="{{ asset('images/users/' . auth()->user()->avatar) }}"
                                                    class="avatar-image-lg" style="max-width: 100%; height: auto; border-radius: 50%;">
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-6 u-s-m-b-30">
                                                        <h2 class="dash__h2 u-s-m-b-8">Name</h2>
                                                        <span class="dash__text">{{ $user->name }}</span>
                                                    </div>
                                                    <div class="col-lg-6 u-s-m-b-30">
                                                        <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>
                                                        <span class="dash__text">{{ $user->email }}</span>
                                                    </div>
                                                    <div class="col-lg-6 u-s-m-b-30">
                                                        <h2 class="dash__h2 u-s-m-b-8">Phone</h2>
                                                        <span class="dash__text">{{ $user->phone }}</span>
                                                    </div>
                                                </div>
                                                <div class="u-s-m-b-16">
                                                    <a class="dash__custom-link btn--e-transparent-brand-b-2"
                                                        href="dash-edit-profile.html">Edit Profile</a>
                                                </div>
                                                <div>
                                                    <a class="dash__custom-link btn--e-brand-b-2" href="#">Change
                                                        Password</a>
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
