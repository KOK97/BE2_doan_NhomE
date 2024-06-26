@extends('layout')
@section('main-content')
    @if (session('success'))
        <div id="alert" class="alert alert-primary" role="alert">{{ session('success') }}</div>
    @endif
    @if (session('destroy'))
        <div id="alert" class="alert alert-danger" role="alert">{{ session('destroy') }}</div>
    @endif
    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-t-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">

                        <!--====== Product Detail Zoom ======-->
                        <div class="pd u-s-m-b-30">
                            <div class="slider-fouc pd-wrap">
                                <div id="pd-o-initiate">
                                    <div class="pd-o-img-wrap" data-src="{{ asset('images/products/' . $product->image) }}">

                                        <img class="u-img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                            data-zoom-image="{{ asset('images/products/' . $product->image) }}"
                                            alt="">
                                    </div>

                                </div>
                                <span class="pd-text">Click for larger zoom</span>
                            </div>
                            <div class="u-s-m-t-15">
                                <div class="slider-fouc">
                                    <div id="pd-o-thumbnail">
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <img class="u-img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Product Detail Zoom ======-->
                    </div>
                    <div class="col-lg-7">
                        <!--====== Product Right Side Details ======-->
                        <div class="pd-detail">
                            <div>
                                <span class="pd-detail__name">{{ $product->name }}</span>
                            </div>
                            <div>
                                @if ($product->sale_id != null)
                                    <div class="pd-detail__inline">
                                        <span class="pd-detail__price">{{ $product->reduced_price }}</span>
                                        <span class="pd-detail__discount">({{ $sale }}% OFF)</span>
                                        <del class="pd-detail__del">{{ $product->price }}vnd</del>
                                    </div>
                                @else
                                    <div class="pd-detail__inline">
                                        <span class="pd-detail__price">{{ $product->price }}vnd</span>
                                    </div>
                                @endif
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star-half-alt"></i>
                                    <span class="pd-detail__review u-s-m-l-4">
                                        <a data-click-scroll="#view-review">{{ $reviews->count() }} Reviews</a></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <span class="pd-detail__preview-desc" id="description">{{ $product->description }}</span>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">
                                    <form method="POST" action="{{ route('product.wishlist.add') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>
                                            <button type="submit">Add to Wishlist</button>
                                            <span class="pd-detail__click-count">({{ $totalLikes }})</span></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <form class="pd-detail__form" action="{{route('cart.carts',$product->id)}}">
                                <div class="pd-detail-inline-2">
                                    <div class="u-s-m-b-15">

                                        <!--====== Input Counter ======-->
                                        <div class="input-counter">

                                            <span class="input-counter__minus fas fa-minus"></span>

                                            <input class="input-counter__text input-counter--text-primary-style"
                                                name="soluong" type="text" value="1" data-min="1" data-max="1000">

                                            <span class="input-counter__plus fas fa-plus"></span>
                                        </div>
                                        <!--====== End - Input Counter ======-->
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                            <ul class="pd-detail__policy-list">
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Buyer Protection.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Full Refund if you don't receive your order.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Returns accepted if product not as described.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--====== End - Product Right Side Details ======-->
                </div>
            </div>
        </div>
    </div>

    <!--====== Product Detail Tab ======-->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pd-tab">
                        <div class="tab-content">
                            <!--====== Tab 3 ======-->
                            <div class="tab-pane fade show active" id="pd-rev">
                                <div class="pd-tab__rev">
                                    <div class="u-s-m-b-30">
                                        <div class="pd-tab__rev-score">
                                            <div class="u-s-m-b-8">
                                                <h2>{{ $reviews->count() }} Reviews - 4.6 (Overall)</h2>
                                            </div>
                                            <div class="gl-rating-style-2 u-s-m-b-8"><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                                            <div class="u-s-m-b-8">
                                                <h4>We want to hear from you!</h4>
                                            </div>

                                            <span class="gl-text">Tell us what you think about this item</span>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <form class="pd-tab__rev-f1">
                                            <div class="rev-f1__group">
                                                <div class="u-s-m-b-15">
                                                    <h2>({{ $reviews->count() }}) đánh giá cho sản phẩm
                                                        {{ $product->name }}</h2>
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <label for="sort-review"></label><select
                                                        class="select-box select-box--primary-style" id="sort-review">
                                                        <option selected>Sort by: Best Rating</option>
                                                        <option>Sort by: Worst Rating</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="rev-f1__review">
                                                @foreach ($reviews as $review)
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name">
                                                                @foreach ($users as $user)
                                                                    @if ($user->id == $review->user_id)
                                                                        {{ $user->name }}
                                                                    @endif
                                                                @endforeach
                                                            </span>

                                                            <span class="review-o__date">{{ $review->created_at }}</span>
                                                        </div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8"><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i>

                                                            <span>(4)</span>
                                                        </div>
                                                        <p class="review-o__text">{{ $review->review_content }}</p>
                                                        @if (auth()->check() && auth()->user()->role === 'admin')
                                                            <form action="{{ route('destroy.comment', $review->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="confirmDelete()"
                                                                    class="btn btn-sm btn-danger"><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                        @else
                                                            @if ($review->user_id == Auth::id())
                                                                <form action="{{ route('destroy.comment', $review->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="confirmDelete()"
                                                                        class="btn btn-sm btn-danger"><i
                                                                            class="fa-solid fa-trash"></i></button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </form>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <form class="pd-tab__rev-f2"
                                            action="{{ route('product.comment', $product->id) }}" method="POST">

                                            @csrf
                                            <h2 class="u-s-m-b-15">Add a Review</h2>
                                            <div class="u-s-m-b-30">
                                                <div class="rev-f2__table-wrap gl-scroll">
                                                    <table class="rev-f2__table">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(1)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star-half-alt"></i>

                                                                        <span>(1.5)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(2)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star-half-alt"></i>

                                                                        <span>(2.5)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(3)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star-half-alt"></i>

                                                                        <span>(3.5)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(4)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star-half-alt"></i>

                                                                        <span>(4.5)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(5)</span>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-1"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-1"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-1.5"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-1.5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-2"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-2"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-2.5"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-2.5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-3"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-3"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-3.5"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-3.5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-4"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-4"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-4.5"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-4.5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-5"
                                                                            name="rating">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="rev-f2__group">
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="reviewer-text">YOUR REVIEW
                                                        *</label>
                                                    <textarea class="text-area text-area--primary-style" name="review_content" id="review_content"
                                                        placeholder="Input Review Content"></textarea>
                                                    @if ($errors->has('review_content'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('review_content') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>

                                                <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 3 ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Product Detail Tab ======-->
    </div>
    <!--====== End - App Content ======-->
    <script>
        function confirmDelete() {
            var result = confirm("Bạn có chắc muốn xóa?");
            if (result) {
                document.getElementById("deleteForm").submit();
            } else {}
        }
        // Ẩn thông báo sau 10 giây
        setTimeout(function() {
            document.getElementById('alert').style.display = 'none';
        }, 10000);



        $(document).ready(function() {
            // Loại bỏ các thẻ HTML khỏi nội dung mô tả
            $("#description").each(function() {
                var text = $(this).html(); // Lấy nội dung HTML
                var strippedText = text.replace(/<[^>]+>/g, ''); // Loại bỏ các thẻ HTML
                $(this).empty(); // Xóa nội dung hiện tại
                $(this).text(strippedText); // Đặt lại nội dung văn bản thuần
            });
        });
    </script>
@endsection
