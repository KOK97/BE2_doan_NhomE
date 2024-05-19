@extends('layout')
@section('main-content')
    <!--====== Main App ======-->
    <div id="app">
        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="shop-w-master">
                                <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>
                                    <span>Bộ lọc</span>
                                </h1>
                                <div class="shop-w-master__sidebar">
                                    <div class="u-s-m-b-30">
                                        {{-- <div class="shop-w shop-w--style">
                                            <form action="" method="GET" class="form-inline">
                                                <div class="input-group">
                                                    <input id="keyword" type="text" name="search" class="form-control"
                                                        placeholder="Tìm sản phẩm theo tên">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="submit"><i
                                                                class="fas fa-search"></i> Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> --}}
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">Thể loại</h1>
                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-category"
                                                    data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-category">
                                                <ul class="shop-w__category-list gl-scroll">
                                                    @foreach ($categories as $category)
                                                        <li class="has-list">
                                                            <a
                                                                href="{{ route('product.category.filter', $category->id) }}">{{ $category->category_name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">RATING</h1>

                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-rating"
                                                    data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-rating">
                                                <ul class="shop-w__list gl-scroll">
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">
                                                            <div class="rating__check-star-wrap"><i
                                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                    class="fas fa-star"></i></div>
                                                        </div>

                                                        <span class="shop-w__total-text">(2)</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">
                                                            <div class="rating__check-star-wrap"><i
                                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                    class="far fa-star"></i>

                                                                <span>& Up</span>
                                                            </div>
                                                        </div>

                                                        <span class="shop-w__total-text">(8)</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">
                                                            <div class="rating__check-star-wrap"><i
                                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                    class="fas fa-star"></i><i class="far fa-star"></i><i
                                                                    class="far fa-star"></i>

                                                                <span>& Up</span>
                                                            </div>
                                                        </div>

                                                        <span class="shop-w__total-text">(10)</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">
                                                            <div class="rating__check-star-wrap"><i
                                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                                                    class="far fa-star"></i>

                                                                <span>& Up</span>
                                                            </div>
                                                        </div>

                                                        <span class="shop-w__total-text">(12)</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">
                                                            <div class="rating__check-star-wrap"><i
                                                                    class="fas fa-star"></i><i class="far fa-star"></i><i
                                                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                                                    class="far fa-star"></i>

                                                                <span>& Up</span>
                                                            </div>
                                                        </div>

                                                        <span class="shop-w__total-text">(1)</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">Giá</h1>
                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-price"
                                                    data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-price">
                                                <form class="shop-w__form-p">
                                                    <div class="shop-w__form-p-wrap">
                                                        <div>
                                                            <label for="price-min"></label>
                                                            <input class="input-text input-text--primary-style"
                                                                type="text" id="price-min" placeholder="Min">
                                                        </div>
                                                        <div>
                                                            <label for="price-max"></label>
                                                            <input class="input-text input-text--primary-style"
                                                                type="text" id="price-max" placeholder="Max">
                                                        </div>
                                                        <div>
                                                            <button
                                                                class="btn btn--icon fas fa-angle-right btn--e-transparent-platinum-b-2"
                                                                type="submit"></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">Tác Giả</h1>
                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-manufacturer"
                                                    data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-manufacturer">
                                                <ul class="shop-w__list-2">
                                                    <li>
                                                        <div class="list__content">

                                                            <input type="checkbox" checked>

                                                            <span>Calvin Klein</span>
                                                        </div>

                                                        <span class="shop-w__total-text">(23)</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">Sale</h1>

                                                <span class="fas fa-minus collapsed shop-w__toggle" data-target="#s-size"
                                                    data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse" id="s-size">
                                                <ul class="shop-w__list gl-scroll">
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="xs">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="xs">XS</label>
                                                            </div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->

                                                        <span class="shop-w__total-text">(2)</span>
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="small">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label"
                                                                    for="small">Small</label>
                                                            </div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->

                                                        <span class="shop-w__total-text">(4)</span>
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="medium">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label"
                                                                    for="medium">Medium</label>
                                                            </div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->

                                                        <span class="shop-w__total-text">(6)</span>
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="large">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label"
                                                                    for="large">Large</label>
                                                            </div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->

                                                        <span class="shop-w__total-text">(8)</span>
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="xl">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="xl">XL</label>
                                                            </div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->

                                                        <span class="shop-w__total-text">(10)</span>
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="xxl">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="xxl">XXL</label>
                                                            </div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->

                                                        <span class="shop-w__total-text">(12)</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12">
                            @if (session('message') || isset($message))
                                <h3>{{ session('message') ?? $message }}</h3>
                            @elseif ($products != null && count($products) > 0)
                                <div class="shop-p">
                                    <div class="shop-p__toolbar u-s-m-b-30">
                                        <div class="shop-p__meta-wrap u-s-m-b-60">
                                            <span class="shop-p__meta-text-1">Kết quả tìm kiếm cho:
                                                {{ $query }}</span>
                                            <span class="shop-p__meta-text-1">Tìm thấy {{ $count }} kết quả</span>
                                            <div class="shop-p__tool-style">
                                                <div class="tool-style__group u-s-m-b-8">
                                                    <span class="js-shop-grid-target is-active">Grid</span>
                                                    <span class="js-shop-list-target">List</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop-p__collection">
                                        <div class="row is-grid-active">
                                            @foreach ($products as $product)
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <div class="product-m">
                                                        <div class="product-m__thumb">
                                                            <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                                href="product-detail.html">
                                                                <img class="aspect__img"
                                                                    src="{{ asset('images/products/' . $product->image) }}"
                                                                    alt="">
                                                            </a>
                                                            <div class="product-m__quick-look">
                                                                <a href="{{ route('show.detail', $product->id) }}"
                                                                    class="fas fa-search" data-modal="modal"
                                                                    data-modal-id="#quick-look" data-tooltip="tooltip"
                                                                    data-placement="top" title="Quick Look"></a>
                                                            </div>
                                                            <div class="product-m__add-cart">
                                                                <a href="{{route('cart.carts',$product->id)}}" class="btn--e-brand" data-modal="modal"
                                                                    data-modal-id="#add-to-cart">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="product-m__content">
                                                            <div class="product-m__category">
                                                                @foreach ($product->categories as $category)
                                                                    <a
                                                                        href="{{route('product.category.filter', $category->id)}}">{{ $category->category_name }}</a>
                                                                @endforeach
                                                            </div>
                                                            <div class="product-m__name">
                                                                <a
                                                                    href="{{ route('show.detail', $product->id) }}">{{ $product->name }}</a>
                                                            </div>
                                                            <div class="product-m__rating gl-rating-style">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <span class="product-m__review">(23)</span>
                                                            </div>
                                                            @if ($product->reduced_price != $product->price)
                                                                <span
                                                                    class="product-0__price">{{ $product->reduced_price }}
                                                                    VND
                                                                    <span
                                                                        class="product-o__discount">{{ $product->price }}
                                                                        VND</span>
                                                                </span>
                                                            @else
                                                                <span class="product-0__price">{{ $product->price }} VND
                                                                    <div class="product-o__discount"></div>
                                                                </span>
                                                            @endif
                                                            <div class="product-m__hover">
                                                                <div class="product-m__preview-description">
                                                                    <span>{{ $product->description }}</span>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('product.wishlist.add') }}">
                                                                    <div class="product-m__wishlist">
                                                                        @csrf
                                                                        <input type="hidden" name="product_id"
                                                                            value="{{ $product->id }}">
                                                                        <button class="far fa-heart" type="submit"
                                                                            data-tooltip="tooltip" data-placement="top"
                                                                            title="Add to Wishlist"></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="u-s-p-y-60">
                                        <!--====== Pagination ======-->
                                        <div class="pagination-wrap">
                                            {{ $products->links('pagination::bootstrap-5') }}
                                        </div>
                                        <!--====== End - Pagination ======-->
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-9 col-md-12">
                                    <h1 class="section__heading u-c-secondary">Danh sách trống</h1>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->
    </div>
@endsection
