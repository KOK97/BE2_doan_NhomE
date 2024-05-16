@extends('layout')
@section('main-content')
    <!--====== App Content ======-->
    <div class="app-content">
        <!--====== Primary Slider ======-->
        <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
            <div class="owl-carousel primary-style-1" id="hero-slider">
                @foreach ($topDiscountedProducts as $product)
                    <div class="hero-slide"
                        style="background-image: url('{{ asset('images/products/' . $product->image) }}');">>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">
                                        <span class="content-span-1 u-c-white">Top Sale</span>
                                        <span class="content-span-2 u-c-white">{{ $product->name }}</span>
                                        <span class="content-span-3 u-c-white">Giảm từ {{ $product->price }} VND
                                            xuống còn {{ $product->reduced_price }} VND</span>
                                        <span class="content-span-4 u-c-white">Giá hiện tại
                                            <span class="u-c-white">{{ $product->reduced_price }} VND</span></span>
                                        <a class="shop-now-link btn--e-brand"
                                            href="{{ route('show.detail', $product->id) }}">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--====== End - Primary Slider ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-16">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">TOP TRENDING</h1>

                                <span class="section__span u-c-silver">CHOOSE CATEGORY</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter-category-container">
                                <div class="filter__category-wrapper">
                                    <button class="btn filter__btn filter__btn--style-1 js-checked" type="button"
                                        data-filter="*">ALL</button>
                                </div>
                                @foreach ($categories as $category)
                                    <div class="filter__category-wrapper">
                                        <button class="btn filter__btn filter__btn--style-1" type="button"
                                            data-filter=".{{ $category->id }}">{{ $category->category_name }}</button>
                                    </div>
                                @endforeach
                            </div>
                            <div class="filter__grid-wrapper u-s-m-t-30">
                                <div class="row">
                                    @php
                                        $displayedProductIds = [];
                                    @endphp
                                    @foreach ($productshow as $product)
                                        @if (!in_array($product->id, $displayedProductIds))
                                            @php
                                                $displayedProductIds[] = $product->id;
                                            @endphp
                                            <div
                                                class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item {{ $product->categories->pluck('id')->implode(' ') }}">
                                                <div class="product-o product-o--hover-on product-o--radius">
                                                    <div class="product-o__wrap">
                                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                            href="product-detail.html">
                                                            <img class="aspect__img"
                                                                src="{{ asset('images/products/' . $product->image) }}"
                                                                alt="">
                                                        </a>
                                                        <div class="product-o__action-wrap">
                                                            <form method="POST"
                                                                action="{{ route('product.wishlist.add') }}">
                                                                <ul class="product-o__action-list">
                                                                    <li>
                                                                        <a href="{{ route('show.detail', $product->id) }}"
                                                                            data-modal="modal" data-modal-id="#quick-look"
                                                                            data-tooltip="tooltip" data-placement="top"
                                                                            title="Quick View"><i
                                                                                class="fas fa-search-plus"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-modal="modal" data-modal-id="#add-to-cart"
                                                                            data-tooltip="tooltip" data-placement="top"
                                                                            title="Add to Cart"><i
                                                                                class="fas fa-plus-circle"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        @csrf
                                                                        <input type="hidden" name="product_id"
                                                                            value="{{ $product->id }}">
                                                                        <a data-tooltip="tooltip" data-placement="top"
                                                                            title="Add to Wishlist"><button
                                                                                type="submit"><i
                                                                                    class="fas fa-heart"></i></button></a>
                                                                    </li>
                                                                </ul>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <span class="product-o__category">
                                                        @foreach ($product->categories as $category)
                                                            <a
                                                                href="shop-side-version-2.html">{{ $category->category_name }}</a>
                                                        @endforeach
                                                    </span>
                                                    <span class="product-o__name">
                                                        <a
                                                            href="{{ route('show.detail', $product->id) }}">{{ $product->name }}</a>
                                                    </span>
                                                    <div class="product-o__rating gl-rating-style">
                                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                            class="fas fa-star-half-alt"></i>
                                                        <span class="product-o__review">(23)</span>
                                                    </div>
                                                    @if ($product->reduced_price != $product->price)
                                                        <span class="product-o__price">{{ $product->reduced_price }} VND
                                                            <span class="product-o__discount">{{ $product->price }}
                                                                VND</span>
                                                        </span>
                                                    @else
                                                        <span class="product-o__price">{{ $product->price }} VND
                                                            <span class="product-o__discount"></span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="load-more">
                                <button class="btn btn--e-brand" type="button">Load More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->

        <!--====== Section 9 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon"><i class="fas fa-truck"></i></div>
                                <div class="service__info-wrap">

                                    <span class="service__info-text-1">Free Shipping</span>

                                    <span class="service__info-text-2">Free shipping on all US order or order above
                                        $200</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon"><i class="fas fa-redo"></i></div>
                                <div class="service__info-wrap">

                                    <span class="service__info-text-1">Shop with Confidence</span>

                                    <span class="service__info-text-2">Our Protection covers your purchase from click to
                                        delivery</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                                <div class="service__info-wrap">

                                    <span class="service__info-text-1">24/7 Help Center</span>

                                    <span class="service__info-text-2">Round-the-clock assistance for a smooth shopping
                                        experience</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 9 ======-->


        <!--====== Section 11 ======-->
        <div class="u-s-p-b-90 u-s-m-b-30">
            @if (isset($latestReviews) && $latestReviews->count() > 0)
                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-46">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary u-s-m-b-12">Bình luận mới nhất của người dùng
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <!--====== Testimonial Slider ======-->
                        <div class="slider-fouc">
                            <div class="owl-carousel" id="testimonial-slider">
                                @foreach ($latestReviews as $review)
                                    <div class="testimonial">
                                        <div class="testimonial__img-wrap">
                                            <img class="testimonial__img"
                                                src="{{ asset('images/users/' . ($review->user->avatar ?? 'default.jpg')) }}"
                                                alt="">
                                        </div>
                                        <div class="testimonial__content-wrap">
                                            <a href="{{ route('show.detail', $review->product->id) }}">
                                                <span class="testimonial__double-quote"><i
                                                        class="fas fa-quote-right"></i></span>
                                                <blockquote class="testimonial__block-quote">
                                                    <p>"{{ $review->review_content }}"</p>
                                                </blockquote>
                                                <span class="testimonial__author">{{ $review->user->name }}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--====== End - Testimonial Slider ======-->
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            @else
                <div class="u-s-p-b-90 u-s-m-b-30"></div>
            @endif
        </div>
        <!--====== End - Section 11 ======-->

    </div>
    <!--====== End - App Content ======-->
@endsection
