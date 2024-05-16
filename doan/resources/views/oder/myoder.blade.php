@extends('layout')
@section('main-content')
    <style>
        .diachi {
            display: flex;
            align-items: center;
        }

        .diachi h6 {
            margin-right: 10px;
        }

        .diachi {
            display: grid;
            grid-template-columns: auto auto;
            align-items: center;
        }

        .diachi a {
            justify-self: end;
        }
    </style>
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

                                <a href="checkout.html">Checkout</a>
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
        <div style="text-align: center;margin: 15px;">
            <h2>Thông tin đơn hàng</h2>
            @if (session('success'))
            {{-- <div class="alert alert-success">
                {{ session('success') }}
            </div> --}}
            <script>
                {{ session('success') }}
            </script>
        @endif
        </div>
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('order.add')}}" method="post">
                            @csrf
                            <div id="checkout-msg-group">
                                <div class="msg u-s-m-b-30">
                                    @if (count($diaChis) == 0)
                                        <h3>Thông tin khách hàng</h3>
                                        <div class="thongtinkhachhang" style="margin: 15px;">
                                            <b>Chưa có thông tin địa chỉ người nhận</b>
                                            <div class="diachi"
                                                style="border-radius: 5px;padding: 5px;border: 1px solid;background-color: darkgray;">
                                                <h6>Thêm mới địa chỉ </h6>
                                                <a style="font-size: 10px;color: red;"
                                                    href="{{ route('diachi.view') }}">Thêm mới </a>
                                            </div>
                                        </div>
                                    @else
                                        <?php
                                        foreach ($diaChis as $diaChi) {
                                            $hoten = $diaChi->tennguoinhan;
                                            $sodt = $diaChi->sodienthoai;
                                            $diachi = $diaChi->diachi;
                                        } ?>
                                        <h3>Thông tin khách hàng</h3>
                                        <div class="thongtinkhachhang" style="margin: 15px;">
                                            <h5>Họ và Tên: <?php echo "<input type='hidden' name='hoten'  value='$hoten'><b style='color:black' id='hoten' name='hoten'>$hoten</b>"; ?></h5>
                                            <h5>Số điện thoại: <?php echo "<input type='hidden' name='sodt'  value='$sodt'><b id='sodt' name='sodt' style='color:black'>$sodt</b>"; ?></h5>
                                            <h5>Địa chỉ: <?php echo "<input type='hidden' name='diachi'  value='$diachi'><b style='color:black'>$diachi</b>"; ?></h5>
                                            <div class="diachi"
                                                style="border-radius: 5px;padding: 5px;border: 1px solid;background-color: darkgray;">
                                                <h6><?php echo $diachi; ?></h6>
                                                <a style="font-size: 10px;color: red;"
                                                    href="{{ route('diachi.view') }}">Thay đổi</a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="msg u-s-m-b-30">

                                    <h3>Sản phẩm</h3>
                                    <div class="table-responsive">
                                        <table class="table-p">
                                            <tbody>
                                                <?php $stt = 0; $tongtien=0; ?>
                                                @if (empty($cartItem))
                                                <b style="text-align: center;display: ruby-text;">Không có sản phẩm trong
                                                    giỏ hàng</b>
                                               @endif
                                            @foreach ($cartItem as $item)
                                                <!--====== Row ======-->
                                                
                                                    <input type="hidden" name="idItem[]" value="{{ $item->id }}">
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

                                                            <span class="table-p__price">Tổng: <?php $tong = $item->soluong * $product->reduced_price; $tongtien = $tongtien + $tong; echo $tong;?> VNĐ</span>
                                                        </td>@endif
                                                    @endforeach
                                                        
                                                        
                                                    </tr>
                                                
                                                <!--====== End - Row ======-->
                                                <?php $stt += 1; ?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="msg u-s-m-b-30">
                                    <h3>Thanh toán</h3>
                                    <div class="thongtinkhachhang" style="margin: 15px;">
                                        <h5>Tổng tiền: <?php echo "<input type='hidden' name='tongtien'  value='$tongtien'><b style='color:black'>$tongtien</b>"?> VNĐ</h5>
                                        <div style="display: ruby-text;">
                                        
                                        <button style="padding: 5px;width: 80px;border-radius: 5px;" class="btn btn--e-transparent-brand-b-2" type="submit">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
