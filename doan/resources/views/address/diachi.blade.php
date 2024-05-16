@extends('layout')
<style>
    body {
        font-family: Arial, sans-serif;
    }

    /* Form container */
    .jypd7H {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    /* Form section */
    .R1TwAI {
        margin-bottom: 20px;
    }

    /* Label */
    .rG6mJB {
        font-weight: bold;
    }

    /* Input fields */
    .AukTuV,
    .SvyEcF {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    /* Button */
    .zvyzwn {
        padding: 10px 20px;
        margin-right: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Hoàn thành button */
    .Dr0Xm6 {
        background-color: #4CAF50;
        color: white;
    }

    /* Trở lại button */
    .Jp08En {
        background-color: #f44336;
        color: white;
    }

    /* Button hover effect */
    .zvyzwn:hover {
        opacity: 0.8;
    }

    /* Loại địa chỉ radio buttons */
    .v_wxlL {
        margin-right: 10px;
    }

    /* Checkbox label */
    ._uXoWc {
        display: flex;
        align-items: center;
    }

    /* Checkbox icon */
    .sp7inB {
        margin-right: 5px;
    }

    .table {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
    }

    /* Phần tử con - tiêu đề "Địa chỉ" */
    .table>.title {
        font-weight: bold;
        color: #333;
        font-size: 18px;
        margin-bottom: 10px;
    }

    /* Phần tử con - container cho các thông tin địa chỉ */
    .table>.address-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Phần tử con - container cho các thông tin người nhận và số điện thoại */
    .thongtin {
        display: flex;
        align-items: center;
    }

    /* Phần tử con - container cho địa chỉ cụ thể */
    .diachi {
        margin-top: 10px;
    }



    /* Phần tử con - container cho nút thiết lập mặc định */
    .chucnang {
        margin-top: 10px;
    }

    /* Phần tử con - phần hiển thị "Mặc định" */
    .dang {
        margin-top: 10px;
    }

    /* Phần tử con - phần hiển thị "Mặc định" trong trạng thái mặc định */
    .dang .macdinh {
        color: green;
    }

    /* Thiết lập màu cho các nút */
    .btnCapNhat,
    .btnXoa,
    .btnthietlap {
        background-color: #ff5722;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 8px 12px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Thiết lập hover cho các nút */
    .btnCapNhat:hover,
    .btnXoa:hover,
    .btnthietlap:hover {
        background-color: #f44336;
    }

    /* Thiết lập disabled cho nút thiết lập mặc định */
    .btnthietlap[disabled] {
        background-color: #ccc;
        cursor: not-allowed;
    }

    /* Phần tử con - container cho các nút cập nhật và xóa */
    .btn {
        display: flex;
        /* display: flex; */
        justify-content: end;
        gap: 10px;
        margin-top: 10px;
    }
</style>
@section('main-content')
    <!--====== End - Main Header ======-->
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

                                    <a href="{{ route('Book Store') }}">Home</a>
                                </li>
                                <li class="is-marked">

                                    <a href="dash-track-order.html">My Account</a>
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

                                        <span class="dash__text u-s-m-b-16">Hello,{{ $user->name }} </span>
                                        <ul class="dash__f-list">
                                            <li>
                                                <a href="{{ route('auth.dashboard') }}">Manage My
                                                    Account</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('auth.profile') }}">My Profile</a>
                                            </li>
                                            <li>
                                                <a class="dash-active" href="{{ route('diachi.view') }}">Address</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('lichsu-Order.view') }}">My Orders</a>
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
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                    <div class="dash__pad-2">

                                        <div class="qtYn7m"
                                            style="border-bottom: 1px solid #efefef;
                                        box-sizing: border-box;
                                        height: 80px;
                                        padding: 22px 30px;
                                        display: flex;
                                        align-items: center;">
                                            <div class="Oe_bEi" style="flex: 1;">
                                                <div class="lOB9lY">Địa chỉ của tôi</div>
                                                <div class="rT9Vbd"></div>
                                            </div>
                                            <div>
                                                <div class="y3hZ9E">
                                                    <div style="display: flex;">
                                                        <button data-modal="modal" data-modal-id="#quick-look"
                                                            class="btn btn--e-brand-b-2" type="submit">Thêm
                                                            mới</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="quick-look">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content modal--shadow">

                                                    <button class="btn dismiss-button fas fa-times" type="button"
                                                        data-dismiss="modal"></button>
                                                    <div class="modal-body">
                                                        <h2>Địa chỉ mới</h2>
                                                        <form action="{{ route('diachi.add') }}" method="GET">
                                                            <div class="jypd7H">
                                                                <div class="kTXLeO">
                                                                    <div class="R1TwAI">
                                                                        <div class="OanBpz Jl3DqQ">
                                                                            <div class="t0HxU5">
                                                                                <div class="rG6mJB">Họ và tên</div>
                                                                                <input class="AukTuV" type="text"
                                                                                    name="hovaten" placeholder="Họ và tên"
                                                                                    autocomplete="name" maxlength="64"
                                                                                    value="" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="FqyAgi">

                                                                        </div>
                                                                        <div class="OanBpz H7kyc3">
                                                                            <div class="t0HxU5">
                                                                                <div class="rG6mJB">Số điện thoại</div>
                                                                                <input class="AukTuV" type="text"
                                                                                    name="sdt"
                                                                                    placeholder="Số điện thoại"
                                                                                    value="" maxlength="10" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="R1TwAI">
                                                                        <div class="tinh"
                                                                            style="margin-bottom: 10px;margin-top: 10px;">
                                                                            <label for="province">Tỉnh/Thành phố:</label>
                                                                            <select id="province" name="province" required>
                                                                                <option value="" disabled selected>
                                                                                    Chọn Tỉnh/Thành phố</option>
                                                                                <option value="Hà Nội">Hà Nội</option>
                                                                                <option value="TP. Hồ Chí Minh">TP. Hồ Chí
                                                                                    Minh</option>
                                                                            </select><br>
                                                                        </div>
                                                                        <div class="quan"
                                                                            style="margin-bottom: 10px;margin-top: 10px;">
                                                                            <label for="district">Quận/Huyện:</label>
                                                                            <select id="district" name="district"
                                                                                required>
                                                                                <option value="" disabled selected>
                                                                                    Chọn Quận/Huyện</option><br>
                                                                            </select><br>
                                                                        </div>
                                                                        <div class="xa"
                                                                            style="margin-bottom: 10px;margin-top: 10px;">
                                                                            <label for="ward">Xã/Phường:</label>
                                                                            <select id="ward" name="ward"
                                                                                required>
                                                                                <option value="" disabled selected>
                                                                                    Chọn Xã/Phường</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="OanBpz H7kyc3">
                                                                        <div class="t0HxU5">
                                                                            <div class="rG6mJB">Địa chỉ cụ thể:</div>
                                                                            <input class="AukTuV" type="text"
                                                                                name="diachicuthe"
                                                                                placeholder="Địa chỉ cụ thể"
                                                                                value="" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="NlC19f">
                                                                        <div>
                                                                            <div class="stardust-popover B6On17"
                                                                                id="stardust-popover4" tabindex="0">
                                                                                <div role="button"
                                                                                    class="stardust-popover__target"><label
                                                                                        class="_uXoWc UWv91s"><input
                                                                                            class="sp7inB" type="checkbox"
                                                                                            name="checkbox"
                                                                                            role="checkbox"
                                                                                            aria-checked="true"
                                                                                            aria-disabled="true">
                                                                                        <div class="H4iGzY ltxYiB mDZXh8">
                                                                                        </div>Đặt làm địa chỉ mặc định
                                                                                    </label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Lr7eTF"
                                                                    style="justify-content: end;display: flex;">
                                                                    <a class="zvyzwn Jp08En" href="diachi">Trở Lại</a>
                                                                    <button class="zvyzwn Dr0Xm6">Hoàn thành</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- danh sách địa chi --}}
                                        <div
                                            class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                            <div class="dash__table-2-wrap gl-scroll">
                                                <table class="dash__table-2">
                                                    <thead>
                                                        <tr>
                                                            <th>Họ và tên</th>
                                                            <th>Số điện thoại</th>
                                                            <th>Địa chỉ</th>
                                                            <th>Đang dùng</th>
                                                            <th>Acction</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($diachi as $item)
                                                            @if ($item->diachimacdinh == 1)
                                                                <tr>
                                                                    <td><?php echo $item->tennguoinhan; ?></td>
                                                                    <td>(+84) <?php echo $item->sodienthoai; ?></td>
                                                                    <td><?php echo $item->diachi; ?></td>
                                                                    <td><?php if ($item->diachimacdinh == 1) {
                                                                        echo 'Đang dùng';
                                                                    } ?></td>
                                                                    <td>
                                                                        <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                            href="{{ route('diachi.delete', $item->id) }}">Xóa</a>
                                                                        @if ($item->diachimacdinh == 1)
                                                                            <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                                href="{{ route('diaChiMacDinh.update', $item->id) }}"
                                                                                style="display: none">Dùng</a>
                                                                        @else
                                                                            <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                                href="{{ route('diaChiMacDinh.update', $item->id) }}">Dùng</a>
                                                                        @endif

                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($diachi as $item)
                                                            @if ($item->diachimacdinh == 0)
                                                                <tr>
                                                                    <td><?php echo $item->tennguoinhan; ?></td>
                                                                    <td>(+84) <?php echo $item->sodienthoai; ?></td>
                                                                    <td><?php echo $item->diachi; ?></td>
                                                                    <td><?php if ($item->diachimacdinh == 1) {
                                                                        echo 'Đang dùng';
                                                                    } ?></td>
                                                                    <td>
                                                                        <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                            href="{{ route('diachi.delete', $item->id) }}">Xóa</a>
                                                                        @if ($item->diachimacdinh == 1)
                                                                            <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                                href="{{ route('diaChiMacDinh.update', $item->id) }}"
                                                                                style="display: none">Dùng</a>
                                                                        @else
                                                                            <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                                href="{{ route('diaChiMacDinh.update', $item->id) }}">Dùng</a>
                                                                        @endif

                                                                    </td>
                                                                </tr>
                                                            @endif
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
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->
    <script>
        // Danh sách các quận/huyện theo tỉnh/thành phố
        const districts = {
            "Hà Nội": ["Ba Đình", "Hoàn Kiếm", "Hai Bà Trưng", "Đống Đa", "Cầu Giấy", "Hoàng Mai", "Thanh Xuân",
                "Long Biên", "Bắc Từ Liêm", "Nam Từ Liêm", "Hà Đông"
            ],
            "TP. Hồ Chí Minh": ["Quận 1", "Quận 2", "Quận 3", "Quận 4", "Quận 5", "Quận 6", "Quận 7", "Quận 8",
                "Quận 9", "Quận 10", "Quận 11", "Quận 12", "Bình Thạnh", "Thủ Đức", "Gò Vấp", "Phú Nhuận",
                "Tân Bình", "Tân Phú", "Bình Tân", "Củ Chi", "Hóc Môn", "Bình Chánh", "Nhà Bè", "Cần Giờ"
            ]
        };
        const locations = {
            "Hà Nội": {
                "Ba Đình": ["Cống Vị", "Điện Biên", "Đội Cấn", "Ngọc Hà", "Ngọc Khánh", "Kim Mã", "Liễu Giai",
                    "Nguyễn Trung Trực"
                ],
                "Hoàn Kiếm": ["Phúc Tân", "Đồng Xuân", "Cửa Đông", "Cửa Nam", "Hàng Bồ", "Hàng Gai", "Chương Dương",
                    "Hàng Trống"
                ],
                // Thêm các xã/phường cho các quận/huyện khác của Hà Nội
            },
            "TP. Hồ Chí Minh": {
                "Quận 1": ["Bến Nghé", "Bến Thành", "Cầu Kho", "Cầu Ông Lãnh", "Cô Giang", "Đa Kao", "Nguyễn Cư Trinh",
                    "Nguyễn Thái Bình"
                ],
                "Quận 2": ["An Phú", "Bình An", "Bình Khánh", "Bình Trưng Đông", "Bình Trưng Tây", "Cát Lái",
                    "Thạnh Mỹ Lợi", "Thảo Điền"
                ],
                "Quận 3": ["Bến Thành", "Cầu Ông Lãnh", "Cô Giang", "Đa Kao", "Nguyễn Cư Trinh", "Nguyễn Đình Chiểu",
                    "Nguyễn Thái Bình", "Nguyễn Văn Trỗi"
                ],
                "Quận 4": ["Bến Nghé", "Thạnh Mỹ Lợi", "Thạnh Qưới", "Thạnh Xuân", "Vĩnh Hội Đông", "Vĩnh Hội Tây",
                    "Vĩnh Khánh"
                ],
                "Quận 5": ["19 Tháng 5", "An Bình", "Bình Hưng Hòa", "Bình Thành", "Bình Trị Đông", "Bình Trị Đông A",
                    "Bùi Hữu Nghĩa", "Cây Gõ"
                ]
            }
        };

        const provinceSelect = document.getElementById("province");
        const districtSelect = document.getElementById("district");
        const wardSelect = document.getElementById("ward");

        // Hàm để tạo các option cho dropdown Quận/Huyện dựa trên sự lựa chọn của tỉnh/thành phố
        function populateDistricts() {
            const selectedProvince = provinceSelect.value;
            const districtOptions = Object.keys(locations[selectedProvince]);

            // Xóa các option cũ trước khi thêm mới
            districtSelect.innerHTML = "<option value='' disabled selected>Chọn Quận/Huyện</option>";

            // Thêm các option mới
            districtOptions.forEach(function(district) {
                const option = document.createElement("option");
                option.text = district;
                option.value = district;
                districtSelect.add(option);
            });

            // Gọi hàm để tạo các option cho dropdown Xã/Phường dựa trên quận/huyện mặc định
            populateWards();
        }

        // Hàm để tạo các option cho dropdown Xã/Phường dựa trên sự lựa chọn của quận/huyện
        function populateWards() {
            const selectedProvince = provinceSelect.value;
            const selectedDistrict = districtSelect.value;
            const wardOptions = locations[selectedProvince][selectedDistrict];

            // Xóa các option cũ trước khi thêm mới
            wardSelect.innerHTML = "<option value='' disabled selected>Chọn Xã/Phường</option>";

            // Thêm các option mới
            wardOptions.forEach(function(ward) {
                const option = document.createElement("option");
                option.text = ward;
                option.value = ward;
                wardSelect.add(option);
            });
        }

        // Gọi hàm populateDistricts() khi có sự thay đổi trong dropdown Tỉnh/Thành phố
        provinceSelect.addEventListener("change", populateDistricts);

        // Gọi hàm populateWards() khi có sự thay đổi trong dropdown Quận/Huyện
        districtSelect.addEventListener("change", populateWards);

        // Khởi đầu: Tạo các option cho dropdown Quận/Huyện dựa trên tỉnh/thành phố mặc định
        populateDistricts();
    </script>
@endsection
