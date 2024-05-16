@extends('layout')
@section('main-content')
<style>
  .muangay {
    border: 1px solid;border-radius: 5px;padding: 5px;
  }
  
  .muangay:hover {
    color: white; /* Màu của chữ khi rê chuột vào */
    background-color: #ff4500; /* Màu nền khi rê chuột vào (nếu muốn) */
  }
</style>
    <!--====== Main App ======-->
    <div id="app">
        @if (session('success'))
            {{-- <div class="alert alert-success">
                {{ session('success') }}
            </div> --}}
            <script>
                window.alert("{{ session('success') }}");
            </script>
        @endif
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

                                        <a href="{{route('Book Store')}}">Home</a>
                                    </li>
                                    <li class="is-marked">

                                        <a href="cart.html">Cart</a>
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
                                    <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                                </div>
                            </div>
                            <div class="col-lg-12" style="display: flex;justify-content: end;">
                                <form class="main-form" method="get" action="{{route('cart.timKiem')}}" style="justify-content: center;display: flex; align-items: center;">

                                    <label for=""></label>

                                    <input class="" type="text" style="padding: 10px;margin-right: 10px;border:none;with:50px" name="search" placeholder="Tên sách">

                                    <button style="display: flex;align-items: center;margin-left: -50px;" class="btn btn--icon fas fa-search mainSearch" type="submit"></button>
                                </form>
                                <!--====== End - Search Form ======-->
                            </div>
                        </div>
                    </div>
                </div>

                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <div class="table-responsive">
                                    <table class="table-p">
                                        <tbody>
                                            <?php $stt = 0; ?>
                                            @if (count($cartItem) == 0)
                                                <b style="text-align: center;display: ruby-text;">Không có sản phẩm trong
                                                    giỏ hàng</b>
                                            @endif
                                            @foreach ($cartItem as $item)
                                                <!--====== Row ======-->
                                                <form action="{{ route('cart.update', $item->id) }}" method="GET">

                                                    <tr>
                                                    @foreach ($products as $product )
                                                        @if ($product->id == $item->productID)
                                                            <td>
                                                            <div class="table-p__box">
                                                                <div class="table-p__img-wrap">

                                                                    <img class="u-img-fluid" src="{{ asset('images/products/' . $product->image) }}" alt="">
                                                                </div>
                                                                <div class="table-p__info">

                                                                    <span class="table-p__name">

                                                                        <a
                                                                            href="product-detail.html"><?php echo $product->name; ?></a></span>
                                                                    <ul class="table-p__variant-list">
                                                                        <li>

                                                                            <span>Thể loại: <?php foreach($productcategorys as $productcategory){
                                                                              if($product->id == $productcategory->product_id){
                                                                                foreach($categories as $categorie){
                                                                                    if($productcategory->category_id == $categorie->id){
                                                                                        $theloai = $categorie->category_name;
                                                                                    }
                                                                                }
                                                                                
                                                                              }
                                                                            }
                                                                            echo $theloai; ?></span>
                                                                        </li>
                                                                        <li>

                                                                            <span>Năm xuất bản: <?php echo $product->publishing_year;?></span>
                                                                        </li>
                                                                        <li>

                                                                            <span>Tác giả: <?php foreach($authors as $author){
                                                                              if($product->author_id = $author->id){
                                                                                $tacgia =  $author->author_name;
                                                                              }
                                                                            }
                                                                            echo $tacgia;
                                                                            ?></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <span class="table-p__price">Giá: <?php echo  $product->reduced_price ?> VNĐ</span>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="table-p__input-counter-wrap">

                                                                <!--====== Input Counter ======-->
                                                                <div class="input-counter">

                                                                    <span class="input-counter__minus fas fa-minus"></span>

                                                                    <input
                                                                        class="input-counter__text input-counter--text-primary-style"
                                                                        type="text" name="soluong"
                                                                        value="{{ $item->soluong }}" data-min="1"
                                                                        data-max="1000">

                                                                    <span class="input-counter__plus fas fa-plus"></span>
                                                                </div>

                                                                <!--====== End - Input Counter ======-->
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <span class="table-p__price">Tổng: <?php $tong = $item->soluong * $product->price;  echo $tong;?> VNĐ</span>
                                                        </td>@endif
                                                    @endforeach
                                                        
                                                        <td><a class="muangay" href="{{ route('oder.view', $item->id) }}">Mua Ngay</a></td>
                                                        <td>
                                                            <div class="table-p__del-wrap">
                                                                {{-- <a class="fas fa-sync"
                                                                    href="{{ route('cart.update', $item->id) }}"></a> --}}
                                                                <button class="fas fa-sync" type="submit"></button>
                                                            </div>
                                                            <div class="table-p__del-wrap">
                                                                <a class="far fa-trash-alt table-p__delete-link"
                                                                    href="{{ route('cart.delete', $item->id) }}"></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </form>
                                                <!--====== End - Row ======-->
                                                <?php $stt += 1; ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="route-box">
                                    <div class="route-box__g1">

                                        <a class="route-box__link" href="{{ route('Book Store') }}"><i
                                                class="fas fa-long-arrow-alt-left"></i>

                                            <span>CONTINUE SHOPPING</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->


            <!--====== Section 3 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <form class="f-cart" href="route('oder.view')">
                                    <div class="row" style="justify-content: end">
                                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                            <div class="f-cart__pad-box">
                                                <div class="u-s-m-b-30">
                                                    <table class="f-cart__table">
                                                        <tbody>
                                                            <tr>
                                                                <td>SỐ LƯỢNG:</td>
                                                                <td><?php $soluong = 0;
                                                                $tongphu = 0;
                                                                $stt = 0; ?>
                                                                    @foreach ($cartItem as $item)
                                                                        <?php $soluong = $soluong + $item->soluong;
                                                                        foreach($products as $product){
                                                                            if($product->id == $item->productID){
                                                                            $tongtien = $product->price * $item->soluong;
                                                                            $tongphu = $tongphu + $tongtien;
                                                                            }
                                                                        }  
                                                                        ?>
                                                                    @endforeach
                                                                    <?php echo $soluong; ?></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>SHIP:</td>
                                                                <td>0 VNĐ</td>
                                                            </tr>
                                                            <tr>
                                                                <td>TỔNG PHỤ:</td>
                                                                <td>
                                                                    <?php echo $tongphu; ?> VNĐ
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>TỔNG TIỀN:</td>
                                                                <td><?php echo $tongphu; ?> VNĐ</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <a class="mini-link btn--e-brand-b-2"
                                                    href="{{route('oders.view')}}">PROCEED TO CHECKOUT</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->
        </div>
        <!--====== End - App Content ======-->
    </div>
@endsection
