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

                                    <a href="{{ route('lichsu-Order.view') }}">My Account</a>
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
                                                <a href="{{ route('diachi.view') }}">Address</a>
                                            </li>
                                            <li>
                                                <a class="dash-active" href="{{ route('lichsu-Order.view') }}">My Orders</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('auth.productrecent') }}">Product
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
                                        <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

                                        <span class="dash__text u-s-m-b-30">Here you can see all products that have been
                                            delivered.</span>
                                        <form class="m-order u-s-m-b-30" method="GET"
                                            action ="{{ route('order.searchOrder') }}" style="display:flex">
                                            <div class="m-order__select-wrapper" style="margin:15px">

                                                <label class="u-s-m-r-8" for="my-order-sort">Trạng thái đơn
                                                    hàng:</label><select class="select-box select-box--primary-style"
                                                    id="my-order-sort" name="optionTrangThai" selected="dahuy">
                                                    <option value="choxacnhan">Chờ xác nhận</option>
                                                    <option value="daxacnhan">Đã xác nhận</option>
                                                    <option value="dagiao">Đã giao</option>
                                                    <option value="dahuy">Đã hủy</option>
                                                    <option selected value="all">Tất cả</option>
                                                </select>
                                            </div>
                                            <div style="margin:15px">
                                                <button type="submit" class="btn btn-white mt-3 mb-3"
                                                    style="background-color: gainsboro;">Tìm</button>
                                            </div>
                                        </form>
                                        <div class="m-order__list">
                                            @if (count($orders) == 0)
                                                <div style="text-align: center"><b>Không có đơn hàng</b></div>
                                            @endif
                                            @foreach ($orders as $order)
                                                <div class="m-order__get">
                                                    <div class="manage-o__header u-s-m-b-30">
                                                        <div class="dash-l-r">
                                                            <div>
                                                                <div class="manage-o__text-2 u-c-secondary">Order
                                                                    #<?php echo $order->id; ?></div>
                                                                <div class="manage-o__text u-c-silver">Ngày mua:
                                                                    <?php echo $order->created_at; ?></div>
                                                            </div>
                                                            <div>
                                                                <div class="dash__link dash__link--brand">
                                                                    @if ($order->trangthai == 'Chờ xác nhận')
                                                                        <a href="dash-manage-order.html"
                                                                            style="color:green;margin-right: 20px;"><?php echo $order->trangthai; ?></a>
                                                                        <a
                                                                            href="{{ route('order.huyDonHang', $order->id) }}">Hủy
                                                                            đơn hàng</a>
                                                                    @else
                                                                        <a href="dash-manage-order.html"
                                                                            style="color:green;margin-right: 20px;"><?php echo $order->trangthai; ?></a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($orderItem as $item)
                                                        @if ($item->orderID == $order->id)
                                                            <div class="manage-o__description">
                                                                <div class="description__container">
                                                                    <div class="description__img-wrap">
                                                                        @foreach ($products as $product)
                                                                            @if ($item->productID == $product->id)
                                                                                <img class="u-img-fluid"
                                                                                    src="{{ asset('images/products/' . $product->image) }}"
                                                                                    alt="">
                                                                    </div>
                                                                    <div class="description-title"><?php echo $product->name; ?></div>
                                                        @endif
                                                    @endforeach
                                                    <br>
                                                </div>
                                                <div class="description__info-wrap">
                                                    <div>

                                                        <span class="manage-o__text-2 u-c-silver">Số lượng:

                                                            <span
                                                                class="manage-o__text-2 u-c-secondary"><?php echo $item->soluong; ?></span></span>
                                                    </div>
                                                    <div>

                                                        <span class="manage-o__text-2 u-c-silver">Tổng tiền:

                                                            <span
                                                                class="manage-o__text-2 u-c-secondary">$<?php echo $item->tongtien; ?></span></span>
                                                    </div>

                                                </div>
                                        </div>
                                        @endif
                                        @endforeach
                                        <div style="display: flex;flex-direction: row-reverse;">
                                            <span class="manage-o__text-2 u-c-silver">Tổng đơn hàng:
                                                <span
                                                    class="manage-o__text-2 u-c-secondary">$<?php echo $order->tongtien; ?></span></span>
                                        </div>
                                    </div>
                                    @endforeach


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
