<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Ludus - Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href='{{ asset("css/vendor.css") }}'>
    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href='{{ asset("css/utility.css") }}'>

    <!--====== App ======-->
    <link rel="stylesheet" href='{{ asset("css/app.css") }}'>
</head>

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <header class="header--style-1">

            <!--====== Nav 1 ======-->
            <nav class="primary-nav primary-nav-wrapper--border">
                <div class="container">

                    <!--====== Primary Nav ======-->
                    <div class="primary-nav">

                        <!--====== Main Logo ======-->

                        <a class="main-logo" href="{{ url('/') }}">
                            <img src="images/logo/logo-1.png" alt=""></a>
                        <!--====== End - Main Logo ======-->


                        <!--====== Search Form ======-->
                        <form class="main-form">
                            <label for="main-search"></label>
                            <input class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" placeholder="Bạn cần tìm gì ?">
                            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                        </form>
                        <!--====== End - Search Form ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation">
                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button>
                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">
                                <span class="ah-close">✕ Close</span>
                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">
                                        <a><i class="far fa-user-circle"></i></a>
                                        <!--====== Dropdown ======-->
                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                            @if(!auth()->check())
                                            <li>
                                                <a href=""><i class="fas fa-user-plus u-s-m-r-6"></i>
                                                    <span>Log in</span></a>
                                            </li>
                                            <li>
                                                <a href=""><i class="fas fa-lock u-s-m-r-6"></i>
                                                    <span>Register</span></a>
                                            </li>
                                            @else
                                            <li>
                                                <a href=""><i class="fas fa-user-circle u-s-m-r-6"></i>
                                                    <span>Account</span></a>
                                            </li>
                                            <li>
                                                <a href=""><i class="fas fa-lock-open u-s-m-r-6"></i>
                                                    <span>Log out</span></a>
                                            </li>
                                            @endif
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Contact">
                                        <a href="tel:***********"><i class="fas fa-phone-volume"></i></a>
                                    </li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Mail">
                                        <a href="mailto:21211TT2873@mail.tdc.edu.vn"><i class="far fa-envelope"></i></a>
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Primary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 1 ======-->


            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation1">

                            <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">
                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list">
                                    <li class="has-dropdown">
                                        <span class="mega-text">E</span>
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">
                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog" type="button"></button>
                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">
                                <span class="ah-close">✕ Close</span>
                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
                                    <li class="has-dropdown">
                                        <a>TÁC GIẢ<i class="fas fa-angle-down u-s-m-l-6"></i></a>
                                        <!--====== Dropdown ======-->
                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>
                                                <a href="blog-left-sidebar.html">Tác giả 1</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown">
                                        <a>THỂ LOẠI<i class="fas fa-angle-down u-s-m-l-6"></i></a>
                                        <!--====== Dropdown ======-->
                                        <span class="js-menu-toggle"></span>
                                        <ul id="category-columns" style="max-height: 200px; overflow-y: auto; display: flex; flex-wrap: wrap;">
                                            @foreach ($categories as $category)
                                            <li class="column" style="width: 150px;">
                                                <a href="#">{{ $category->category_name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li>
                                        <a href="shop-side-version-2.html">KHUYẾN MÃI</a>
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button>

                            <span class="total-item-round">2</span>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li>

                                        <a href="{{ url('/') }}"><i class="fas fa-home u-c-brand"></i></a>
                                    </li>
                                    <li>

                                        <a href="{{ url('/wishlist') }}"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li class="has-dropdown">

                                        <a class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>

                                            <span class="total-item-round">2</span></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart">

                                            <!--====== Mini Product Container ======-->
                                            <div class="mini-product-container gl-scroll u-s-m-b-15">

                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.html">

                                                                <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt=""></a>
                                                        </div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="shop-side-version-2.html">Electronics</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.html">Yellow Wireless Headphone</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span>
                                                        </div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.html">

                                                                <img class="u-img-fluid" src="images/product/electronic/product18.jpg" alt=""></a>
                                                        </div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="shop-side-version-2.html">Electronics</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.html">Nikon DSLR Camera 4k</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span>
                                                        </div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.html">

                                                                <img class="u-img-fluid" src="images/product/women/product8.jpg" alt=""></a>
                                                        </div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="shop-side-version-2.html">Women Clothing</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.html">New Dress D Nice Elegant</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span>
                                                        </div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.html">

                                                                <img class="u-img-fluid" src="images/product/men/product8.jpg" alt=""></a>
                                                        </div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="shop-side-version-2.html">Men Clothing</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.html">New Fashion D Nice Elegant</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span>
                                                        </div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->
                                            </div>
                                            <!--====== End - Mini Product Container ======-->


                                            <!--====== Mini Product Statistics ======-->
                                            <div class="mini-product-stat">
                                                <div class="mini-total">

                                                    <span class="subtotal-text">SUBTOTAL</span>

                                                    <span class="subtotal-value">$16</span>
                                                </div>
                                                <div class="mini-action">

                                                    <a class="mini-link btn--e-brand-b-2" href="checkout.html">PROCEED TO CHECKOUT</a>

                                                    <a class="mini-link btn--e-transparent-secondary-b-2" href="cart.html">VIEW CART</a>
                                                </div>
                                            </div>
                                            <!--====== End - Mini Product Statistics ======-->
                                        </div>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->
        </header>
        <!--====== End - Main Header ======-->
        @yield('main-content')
        <!--====== Main Footer ======-->
        <footer>
            <div class="outer-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">
                                <span class="outer-footer__content-title">Contact Us</span>
                                <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>
                                    <span>4247 Ashford Drive Virginia VA-20006 USA</span>
                                </div>
                                <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>
                                    <span>(+0) 900 901 904</span>
                                </div>
                                <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>
                                    <span>contact@domain.com</span>
                                </div>
                                <div class="outer-footer__social">
                                    <ul>
                                        <li>
                                            <a class="s-fb--color-hover" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a class="s-tw--color-hover" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="s-youtube--color-hover" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a class="s-insta--color-hover" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a class="s-gplus--color-hover" href="https://www.google.com/"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">

                                        <span class="outer-footer__content-title">Information</span>
                                        <div class="outer-footer__list-wrap">
                                            <ul>
                                                <li>

                                                    <a href="cart.html">Cart</a>
                                                </li>
                                                <li>

                                                    <a href="dashboard.html">Account</a>
                                                </li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Manufacturer</a>
                                                </li>
                                                <li>

                                                    <a href="dash-payment-option.html">Finance</a>
                                                </li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Shop</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">
                                        <div class="outer-footer__list-wrap">
                                            <span class="outer-footer__content-title">Our Company</span>
                                            <ul>
                                                <li>

                                                    <a href="about.html">About us</a>
                                                </li>
                                                <li>

                                                    <a href="contact.html">Contact Us</a>
                                                </li>
                                                <li>

                                                    <a href="{{ url('/') }}">Sitemap</a>
                                                </li>
                                                <li>

                                                    <a href="dash-my-order.html">Delivery</a>
                                                </li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Store</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="outer-footer__content">

                                <span class="outer-footer__content-title">Join our Newsletter</span>
                                <form class="newsletter">
                                    <div class="u-s-m-b-15">
                                        <div class="radio-box newsletter__radio">
                                            <input type="radio" id="male" name="gender">
                                            <div class="radio-box__state radio-box__state--primary">
                                                <label class="radio-box__label" for="male">Male</label>
                                            </div>
                                        </div>
                                        <div class="radio-box newsletter__radio">
                                            <input type="radio" id="female" name="gender">
                                            <div class="radio-box__state radio-box__state--primary">
                                                <label class="radio-box__label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="newsletter__group">

                                        <label for="newsletter"></label>

                                        <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Enter your Email">

                                        <button class="btn btn--e-brand newsletter__btn" type="submit">SUBSCRIBE</button>
                                    </div>

                                    <span class="newsletter__text">Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">

                                    <span>Copyright © 2024</span>

                                    <a href="{{ url('/') }}">Reshop</a>

                                    <span>All Right Reserved</span>
                                </div>
                                <div class="lower-footer__payment">
                                    <ul>
                                        <li><i class="fab fa-cc-stripe"></i></li>
                                        <li><i class="fab fa-cc-paypal"></i></li>
                                        <li><i class="fab fa-cc-mastercard"></i></li>
                                        <li><i class="fab fa-cc-visa"></i></li>
                                        <li><i class="fab fa-cc-discover"></i></li>
                                        <li><i class="fab fa-cc-amex"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--====== End - Main App ======-->
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <!--====== Vendor Js ======-->
    <script src='{{ asset("js/vendor.js") }}'></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src='{{ asset("js/jquery.shopnav.js") }}'></script>

    <!--====== App ======-->
    <script src='{{ asset("js/app.js") }}'></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var message = "{{ session('success') }}";
            if (message) {
                alert(message);
            }
        });
    </script>
</body>

</html>