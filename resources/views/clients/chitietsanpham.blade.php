@extends('layouts.client')

@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area breadcrumb__style-2 include-bg pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <div class="breadcrumb__list has-icon">
                            <span class="breadcrumb-icon">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.42393 16H15.5759C15.6884 16 15.7962 15.9584 15.8758 15.8844C15.9553 15.8104 16 15.71 16 15.6054V6.29143C16 6.22989 15.9846 6.1692 15.9549 6.11422C15.9252 6.05923 15.8821 6.01147 15.829 5.97475L8.75305 1.07803C8.67992 1.02736 8.59118 1 8.5 1C8.40882 1 8.32008 1.02736 8.24695 1.07803L1.17098 5.97587C1.11791 6.01259 1.0748 6.06035 1.04511 6.11534C1.01543 6.17033 0.999976 6.23101 1 6.29255V15.6063C1.00027 15.7108 1.04504 15.8109 1.12451 15.8847C1.20398 15.9585 1.31165 16 1.42393 16ZM10.1464 15.2107H6.85241V10.6202H10.1464V15.2107ZM1.84866 6.48977L8.4999 1.88561L15.1517 6.48977V15.2107H10.9946V10.2256C10.9946 10.1209 10.95 10.0206 10.8704 9.94654C10.7909 9.87254 10.683 9.83096 10.5705 9.83096H6.42848C6.316 9.83096 6.20812 9.87254 6.12858 9.94654C6.04904 10.0206 6.00435 10.1209 6.00435 10.2256V15.2107H1.84806L1.84866 6.48977Z"
                                        fill="#55585B" stroke="#55585B" stroke-width="0.5" />
                                </svg>
                            </span>
                            <span><a href="#">Home</a></span>
                            <span><a
                                    href="#">{{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}</a></span>
                            <span>
                                @php
                                    $tenSanPham = $sanpham->ten_san_pham;
                                    // Kiểm tra nếu chữ cái đầu chưa viết hoa
                                    if (mb_strtoupper(mb_substr($tenSanPham, 0, 1)) !== mb_substr($tenSanPham, 0, 1)) {
                                        $tenSanPham = mb_convert_case($tenSanPham, MB_CASE_TITLE, 'UTF-8');
                                    }
                                @endphp

                                {{ $tenSanPham }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tp-product-details-area">
        <div class="tp-product-details-top pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav flex-sm-column" id="productDetailsNavThumb" role="tablist">
                                    @foreach ($anhsanphams as $index => $anhsanpham)
                                        <button style="width: 100px" class="nav-link {{ $loop->first ? 'active' : '' }}"
                                            id="nav-{{ $index + 1 }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-{{ $index + 1 }}" type="button" role="tab"
                                            aria-controls="nav-{{ $index + 1 }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            <img src="{{ asset($anhsanpham->hinh_anh) }}" class="img-thumbnail"
                                                alt="Ảnh sản phẩm" width="100px">
                                        </button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content m-img" id="productDetailsNavContent">
                                @foreach ($anhsanphams as $index => $anhsanpham)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                        id="nav-{{ $index + 1 }}" role="tabpanel"
                                        aria-labelledby="nav-{{ $index + 1 }}-tab">
                                        <div class="tp-product-details-nav-main-thumb">
                                            <img src="{{ asset($anhsanpham->hinh_anh) }}" class="img-fluid rounded-4"
                                                alt="Ảnh chi tiết sản phẩm">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> <!-- col end -->
                    <div class="col-xl-5 col-lg-6">
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>{{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}</span>
                            </div>
                            <h3 class="tp-product-details-title">@php
                                $tenSanPham = $sanpham->ten_san_pham;
                                // Kiểm tra nếu chữ cái đầu chưa viết hoa
                                if (mb_strtoupper(mb_substr($tenSanPham, 0, 1)) !== mb_substr($tenSanPham, 0, 1)) {
                                    $tenSanPham = mb_convert_case($tenSanPham, MB_CASE_TITLE, 'UTF-8');
                                }
                            @endphp

                                {{ $tenSanPham }}
                            </h3>

                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                    <span>Đánh giá</span>
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                    <div class="star_warning">
                                        <p class="fs-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($diemtrungbinh))
                                                    <span class="star text-warning">★</span>
                                                @elseif ($i == ceil($diemtrungbinh))
                                                    @if ($diemtrungbinh - floor($diemtrungbinh) >= 0.3)
                                                        <span class="star text-warning">☆</span>
                                                    @else
                                                        <span class="star text-warning">☆</span>
                                                    @endif
                                                @else
                                                    <span class="star text-warning">☆</span>
                                                @endif
                                            @endfor
                                        </p>
                                    </div>
                                    <div class="tp-product-details-reviews">
                                        <span>({{ $soluotdanhgia }} Reviews)</span>
                                    </div>
                                </div>
                            </div>

                            @php
                                // Lưu trữ màu sắc và dung lượng đã hiển thị
                                $displayedColors = [];
                                $displayedCapacities = [];
                            @endphp

                            <!-- Price -->
                            <div class="tp-product-details-price-wrapper mb-20">
                                @php
                                    // Tìm giá thấp nhất từ danh sách biến thể sản phẩm
                                    $giaThapNhat = $bienthesanphams->max('gia_moi'); // 'gia_ban' là trường chứa giá của biến thể sản phẩm
                                    $giaGocThapNhat = $bienthesanphams->min('gia_moi'); // Nếu bạn có trường giá gốc (giá trước khi giảm)
                                @endphp

                                <!-- Price -->
                                @if ($bienthesanphams->isNotEmpty())
                                    @php
                                        $bienThe = $bienthesanphams->first();
                                        $giaCu = $bienThe->gia_cu ?? 0;
                                        $giaMoi = $bienThe->gia_moi ?? 0;
                                    @endphp

                                    <div class="tp-product-details-price-wrapper mb-20">

                                        <span id="old-price" class="tp-product-details-price old-price"
                                            style="{{ $giaMoi < $giaCu ? '' : 'display: none;' }}">
                                            {{ number_format($giaCu, 0, ',', '.') }}₫
                                        </span>
                                        <span id="new-price" class="tp-product-details-price new-price">
                                            {{ number_format($giaMoi < $giaCu ? $giaMoi : $giaCu, 0, ',', '.') }}₫
                                        </span>

                                    </div>
                                @endif
                                <!-- Variations -->
                                <div class="tp-product-details-variation">
                                    <!-- Color Variation -->
                                    <div class="tp-product-details-variation-item">
                                        <h4 class="tp-product-details-variation-title">Màu sắc :</h4>
                                        <div class="tp-product-details-variation-list">
                                            @php
                                                $displayedColors = [];
                                            @endphp

                                            @foreach ($bienthesanphams as $bienThe)
                                                @if ($bienThe->mauSac && $bienThe->mauSac->trang_thai == 1)
                                                    @php
                                                        $tenMau = $bienThe->mauSac->ten_mau_sac;
                                                        $maMau = $bienThe->mauSac->ma_mau;
                                                    @endphp

                                                    @if (!in_array($tenMau, $displayedColors))
                                                        @php
                                                            $displayedColors[] = $tenMau;
                                                        @endphp

                                                        <button type="button" class="color tp-color-variation-btn "
                                                            data-mau-sac-id="{{ $bienThe->mau_sac_id }}">
                                                            <span data-bg-color="{{ $maMau }}"
                                                                style="background-color: {{ $maMau }};
                             border: 2px solid #000;
                             display: inline-block;
                             width: 40px;
                             height: 40px;">
                                                            </span>
                                                            <span
                                                                class="tp-color-variation-tootltip">{{ $tenMau }}</span>
                                                        </button>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>

                                    </div>

                                    <!-- Dung Lượng Variation -->
                                    <!-- Dung Lượng Variation -->
                                    <div class="tp-product-details-variation-item">
                                        <h4 class="tp-product-details-variation-title" id="capacity-title">Dung lượng:
                                        </h4>
                                        <div class="tp-product-details-variation-list">
                                            @php
                                                $displayedCapacities = [];
                                            @endphp

                                            @foreach ($bienthesanphams as $bienthesanpham)
                                                @if ($bienthesanpham->dungLuong)
                                                    @php
                                                        $tenDungLuong = $bienthesanpham->dungLuong->ten_dung_luong;
                                                    @endphp

                                                    @if (!in_array($tenDungLuong, $displayedCapacities))
                                                        @php
                                                            $displayedCapacities[] = $tenDungLuong;
                                                        @endphp

                                                        <button type="button" class="tp-size-variation-btn"
                                                            style="width: auto; margin-bottom: 4px; padding: 0 5px;"
                                                            data-dung-luong-id="{{ $bienthesanpham->dung_luong_id }}">
                                                            <span>{{ $tenDungLuong }}</span>
                                                        </button>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .tp-color-variation-btn {
                                        pointer-events: auto;
                                    }

                                    .tp-color-variation-btn {
                                        margin: 10px;
                                    }

                                    .tp-color-variation-btn.disabled {
                                        pointer-events: none;
                                        opacity: 1 !important;
                                    }

                                    /* Vùng màu */
                                    .tp-color-variation-btn span[data-bg-color] {
                                        width: 42px;
                                        height: 42px;
                                        border-radius: 4px;
                                        display: inline-block;
                                        background-clip: padding-box;
                                        border: 2px solid #000;
                                        opacity: 1 !important;
                                        box-shadow: none !important;
                                        filter: none !important;
                                    }
                                </style>

                            </div>
                            <div class="tp-product-details-action-wrapper">
                                <p id="available-quantity">Số lượng còn lại: 0</p>
                                <h3 class="tp-product-details-action-title">Chọn số lượng</h3>
                                <div class="tp-product-details-action-item-wrapper d-flex align-items-center">

                                    <div class="tp-product-details-quantity">
                                        <div class="tp-product-quantity mb-15 mr-15">
                                            <span class="tp-cart-minus">
                                                <svg width="11" height="2" viewBox="0 0 11 2" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1H10" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <input class="tp-cart-input text-center" id="so-luong-mua" type="number"
                                                min="1" max="0" value="1" data-max-quantity="0"
                                                style="-moz-appearance: textfield; appearance: textfield;">

                                            <span class="tp-cart-plus">
                                                <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H10" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <style>
                                        /* Bỏ nút tăng giảm mặc định trên input number */
                                        input[type=number]::-webkit-inner-spin-button,
                                        input[type=number]::-webkit-outer-spin-button {
                                            -webkit-appearance: none;
                                            margin: 0;
                                        }

                                        input[type=number] {
                                            -moz-appearance: textfield;
                                            /* Firefox */
                                            appearance: textfield;
                                            /* Chrome/Safari */
                                        }
                                    </style>
                                    <script>
                                        let sanPhamId = {{ $sanpham->id }};
                                        let selectedMauSacId = null;
                                        let selectedDungLuongId = null;
                                        let allVariants = [];

                                        document.addEventListener("DOMContentLoaded", function() {
                                            fetchAllVariants();
                                        });

                                        function fetchAllVariants() {
                                            $.ajax({
                                                url: "{{ route('sanpham.get_all_variants') }}",
                                                method: "GET",
                                                data: {
                                                    san_pham_id: sanPhamId
                                                },
                                                success: function(response) {
                                                    allVariants = response;
                                                    setupVariantEvents();
                                                },
                                                error: function() {
                                                    alert("Không thể tải danh sách biến thể.");
                                                }
                                            });
                                        }

                                        function setupVariantEvents() {
                                            document.querySelectorAll('.tp-color-variation-btn').forEach(button => {
                                                button.addEventListener('click', function() {
                                                    if (this.classList.contains('disabled')) return;

                                                    const id = this.getAttribute('data-mau-sac-id');

                                                    if (selectedMauSacId === id) {
                                                        selectedMauSacId = null;
                                                        this.classList.remove('active');
                                                    } else {
                                                        selectedMauSacId = id;
                                                        document.querySelectorAll('.tp-color-variation-btn').forEach(btn => btn.classList
                                                            .remove('active'));
                                                        this.classList.add('active');
                                                    }

                                                    updateAvailableOptions(); // 💥
                                                    fetchPrice();
                                                });
                                            });

                                            document.querySelectorAll('.tp-size-variation-btn').forEach(button => {
                                                button.addEventListener('click', function() {
                                                    if (this.classList.contains('disabled')) return;

                                                    const id = this.getAttribute('data-dung-luong-id');

                                                    if (selectedDungLuongId === id) {
                                                        selectedDungLuongId = null;
                                                        this.classList.remove('active');
                                                    } else {
                                                        selectedDungLuongId = id;
                                                        document.querySelectorAll('.tp-size-variation-btn').forEach(btn => btn.classList
                                                            .remove('active'));
                                                        this.classList.add('active');
                                                    }

                                                    updateAvailableOptions(); // 💥
                                                    fetchPrice();
                                                });
                                            });
                                        }

                                        function updateAvailableOptions() {
                                            // 🎯 Lọc Dung lượng theo Màu đã chọn
                                            document.querySelectorAll('.tp-size-variation-btn').forEach(button => {
                                                const dungLuongId = button.getAttribute('data-dung-luong-id');
                                                const exists = allVariants.some(variant =>
                                                    (!selectedMauSacId || variant.mau_sac_id == selectedMauSacId) &&
                                                    variant.dung_luong_id == dungLuongId
                                                );
                                                button.classList.toggle('disabled', !exists);
                                            });

                                            // 🎯 Lọc Màu theo Dung lượng đã chọn
                                            document.querySelectorAll('.tp-color-variation-btn').forEach(button => {
                                                const mauSacId = button.getAttribute('data-mau-sac-id');
                                                const exists = allVariants.some(variant =>
                                                    (!selectedDungLuongId || variant.dung_luong_id == selectedDungLuongId) &&
                                                    variant.mau_sac_id == mauSacId
                                                );
                                                button.classList.toggle('disabled', !exists);
                                            });
                                        }
                                        // Lấy giá sản phẩm
                                        function fetchPrice() {
                                            if (typeof selectedMauSacId !== 'undefined' && typeof selectedDungLuongId !== 'undefined' && selectedMauSacId &&
                                                selectedDungLuongId) {
                                                $.ajax({
                                                    url: '{{ route('sanpham.lay_gia_bien_the') }}',
                                                    method: 'GET',
                                                    data: {
                                                        san_pham_id: sanPhamId,
                                                        mau_sac_id: selectedMauSacId,
                                                        dung_luong_id: selectedDungLuongId
                                                    },
                                                    success: function(res) {
                                                        console.log('API response:', res);
                                                        if (res.status === 'success') {
                                                            const format = (num) =>
                                                                new Intl.NumberFormat('vi-VN', {
                                                                    style: 'currency',
                                                                    currency: 'VND'
                                                                }).format(num);

                                                            if (res.gia_moi < res.gia_cu) {
                                                                $('#new-price').text(format(res.gia_moi));
                                                                $('#old-price').text(format(res.gia_cu)).show();
                                                            } else {
                                                                $('#new-price').text(format(res.gia_cu));
                                                                $('#old-price').hide();
                                                            }

                                                            if (typeof res.so_luong !== 'undefined') {
                                                                $('#available-quantity').text('Số lượng còn lại: ' + res.so_luong);
                                                                $('#so-luong-mua').val(1).attr('data-max-quantity', res.so_luong);
                                                            } else {
                                                                $('#available-quantity').text('Số lượng còn lại: Không xác định');
                                                                $('#so-luong-mua').val(1).attr('data-max-quantity', 1);
                                                            }
                                                        } else {
                                                            alert(res.message);
                                                        }
                                                    },
                                                    error: function() {
                                                        alert('Lỗi khi gọi API.');
                                                    }
                                                });
                                            }
                                        }
                                        // Khi nhấn dấu cộng/trừ
                                        $(document).on('click', '.tp-cart-plus, .tp-cart-minus', function() {
                                            const input = $(this).closest('.tp-product-quantity').find('#so-luong-mua');
                                            const max = parseInt(input.attr('data-max-quantity')) || 1;
                                            let val = parseInt(input.val()) || 1;

                                            // if ($(this).hasClass('tp-cart-plus')) {
                                            //     console.log(2);
                                            //     if (val < max) {
                                            //         val++;
                                            //     } else {
                                            //         val = max;
                                            //     }
                                            // } else {
                                            //     if (val > 1) {
                                            //         val--;
                                            //     } else {
                                            //         val = 1;
                                            //     }
                                            // }

                                            input.val(val);
                                        });

                                        // Khi nhập trực tiếp số
                                        $(document).on('input', '#so-luong-mua', function() {
                                            const input = $(this);
                                            const max = parseInt(input.attr('data-max-quantity')) || 1;
                                            let raw = input.val().replace(/[^\d]/g, '');

                                            if (raw === '') return;

                                            let val = parseInt(raw);
                                            if (isNaN(val) || val < 1) val = 1;
                                            if (val > max) val = max;

                                            input.val(val);
                                        });

                                        // Khi rời khỏi input
                                        $(document).on('blur', '#so-luong-mua', function() {
                                            const input = $(this);
                                            const max = parseInt(input.attr('data-max-quantity')) || 1;
                                            let val = parseInt(input.val());

                                            if (isNaN(val) || val < 1) val = 1;
                                            if (val > max) val = max;

                                            input.val(val);
                                        });
                                    </script>


                                    <div class="tp-product-details-add-to-cart mb-15 w-100">
                                        <button class="tp-product-details-add-to-cart-btn w-100"
                                            onclick="addToCart({{ $sanpham->id }})">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>

                                <button class="tp-product-details-buy-now-btn w-100"
                                    onclick="addToCartAndRedirect({{ $sanpham->id }}, '{{ route('cart.index') }}')">Mua
                                    ngay</button>
                            </div>

                            <div class="tp-product-details-action-sm">
                                @if (Auth::user())
                                    <button type="button" class="tp-product-details-action-sm-btn"
                                        id="wishlist-button-{{ $sanpham->id }}"
                                        onclick="Love({{ $sanpham->id }}, {{ $sanpham->id }})">
                                        <span id="wishlist-icon-{{ $sanpham->id }}">
                                            @if (isset($isLoved[$sanpham->id]) && $isLoved[$sanpham->id])
                                                <svg width="20" height="19" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c2.04 0 3.99.81 5.5 2.09C15.51 3.81 17.46 3 19.5 3 22.58 3 25 5.42 25 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                                        fill="currentColor" />
                                                </svg>
                                            @else
                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.33541 7.54172C3.36263 10.6766 7.42094 13.2113 8.49945 13.8387C9.58162 13.2048 13.6692 10.6421 14.6635 7.5446C15.3163 5.54239 14.7104 3.00621 12.3028 2.24514C11.1364 1.8779 9.77578 2.1014 8.83648 2.81432C8.64012 2.96237 8.36757 2.96524 8.16974 2.81863C7.17476 2.08487 5.87499 1.86999 4.69024 2.24514C2.28632 3.00549 1.68259 5.54167 2.33541 7.54172ZM8.50115 15C8.4103 15 8.32018 14.9784 8.23812 14.9346C8.00879 14.8117 2.60674 11.891 1.29011 7.87081C1.28938 7.87081 1.28938 7.8701 1.28938 7.8701C0.462913 5.33895 1.38316 2.15812 4.35418 1.21882C5.7492 0.776121 7.26952 0.97088 8.49895 1.73195C9.69029 0.993159 11.2729 0.789057 12.6401 1.21882C15.614 2.15956 16.5372 5.33966 15.7115 7.8701C14.4373 11.8443 8.99571 14.8088 8.76492 14.9332C8.68286 14.9777 8.592 15 8.50115 15Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.49945 13.8387L8.42402 13.9683L8.49971 14.0124L8.57526 13.9681L8.49945 13.8387ZM14.6635 7.5446L14.5209 7.4981L14.5207 7.49875L14.6635 7.5446ZM12.3028 2.24514L12.348 2.10211L12.3478 2.10206L12.3028 2.24514ZM8.83648 2.81432L8.92678 2.93409L8.92717 2.9338L8.83648 2.81432ZM8.16974 2.81863L8.25906 2.69812L8.25877 2.69791L8.16974 2.81863ZM4.69024 2.24514L4.73548 2.38815L4.73552 2.38814L4.69024 2.24514ZM8.23812 14.9346L8.16727 15.0668L8.16744 15.0669L8.23812 14.9346ZM1.29011 7.87081L1.43266 7.82413L1.39882 7.72081H1.29011V7.87081ZM1.28938 7.8701L1.43938 7.87009L1.43938 7.84623L1.43197 7.82354L1.28938 7.8701ZM4.35418 1.21882L4.3994 1.36184L4.39955 1.36179L4.35418 1.21882ZM8.49895 1.73195L8.42 1.85949L8.49902 1.90841L8.57801 1.85943L8.49895 1.73195ZM12.6401 1.21882L12.6853 1.0758L12.685 1.07572L12.6401 1.21882ZM15.7115 7.8701L15.5689 7.82356L15.5686 7.8243L15.7115 7.8701ZM8.76492 14.9332L8.69378 14.8011L8.69334 14.8013L8.76492 14.9332ZM2.19287 7.58843C2.71935 9.19514 4.01596 10.6345 5.30013 11.744C6.58766 12.8564 7.88057 13.6522 8.42402 13.9683L8.57487 13.709C8.03982 13.3978 6.76432 12.6125 5.49626 11.517C4.22484 10.4185 2.97868 9.02313 2.47795 7.49501L2.19287 7.58843ZM8.57526 13.9681C9.12037 13.6488 10.4214 12.8444 11.7125 11.729C12.9999 10.6167 14.2963 9.17932 14.8063 7.59044L14.5207 7.49875C14.0364 9.00733 12.7919 10.4 11.5164 11.502C10.2446 12.6008 8.9607 13.3947 8.42364 13.7093L8.57526 13.9681ZM14.8061 7.59109C15.1419 6.5613 15.1554 5.39131 14.7711 4.37633C14.3853 3.35729 13.5989 2.49754 12.348 2.10211L12.2576 2.38816C13.4143 2.75381 14.1347 3.54267 14.4905 4.48255C14.8479 5.42648 14.8379 6.52568 14.5209 7.4981L14.8061 7.59109ZM12.3478 2.10206C11.137 1.72085 9.72549 1.95125 8.7458 2.69484L8.92717 2.9338C9.82606 2.25155 11.1357 2.03494 12.2577 2.38821L12.3478 2.10206ZM8.74618 2.69455C8.60221 2.8031 8.40275 2.80462 8.25906 2.69812L8.08043 2.93915C8.33238 3.12587 8.67804 3.12163 8.92678 2.93409L8.74618 2.69455ZM8.25877 2.69791C7.225 1.93554 5.87527 1.71256 4.64496 2.10213L4.73552 2.38814C5.87471 2.02742 7.12452 2.2342 8.08071 2.93936L8.25877 2.69791ZM4.64501 2.10212C3.39586 2.49722 2.61099 3.35688 2.22622 4.37554C1.84299 5.39014 1.85704 6.55957 2.19281 7.58826L2.478 7.49518C2.16095 6.52382 2.15046 5.42513 2.50687 4.48154C2.86175 3.542 3.58071 2.7534 4.73548 2.38815L4.64501 2.10212ZM8.50115 14.85C8.43415 14.85 8.36841 14.8341 8.3088 14.8023L8.16744 15.0669C8.27195 15.1227 8.38645 15.15 8.50115 15.15V14.85ZM8.30897 14.8024C8.19831 14.7431 6.7996 13.9873 5.26616 12.7476C3.72872 11.5046 2.07716 9.79208 1.43266 7.82413L1.14756 7.9175C1.81968 9.96978 3.52747 11.7277 5.07755 12.9809C6.63162 14.2373 8.0486 15.0032 8.16727 15.0668L8.30897 14.8024ZM1.29011 7.72081C1.31557 7.72081 1.34468 7.72745 1.37175 7.74514C1.39802 7.76231 1.41394 7.78437 1.42309 7.8023C1.43191 7.81958 1.43557 7.8351 1.43727 7.84507C1.43817 7.8504 1.43869 7.85518 1.43898 7.85922C1.43913 7.86127 1.43923 7.8632 1.43929 7.865C1.43932 7.86591 1.43934 7.86678 1.43936 7.86763C1.43936 7.86805 1.43937 7.86847 1.43937 7.86888C1.43937 7.86909 1.43937 7.86929 1.43938 7.86949C1.43938 7.86959 1.43938 7.86969 1.43938 7.86979C1.43938 7.86984 1.43938 7.86992 1.43938 7.86994C1.43938 7.87002 1.43938 7.87009 1.28938 7.8701C1.13938 7.8701 1.13938 7.87017 1.13938 7.87025C1.13938 7.87027 1.13938 7.87035 1.13938 7.8704C1.13938 7.8705 1.13938 7.8706 1.13938 7.8707C1.13938 7.8709 1.13938 7.87111 1.13938 7.87131C1.13939 7.87173 1.13939 7.87214 1.1394 7.87257C1.13941 7.87342 1.13943 7.8743 1.13946 7.8752C1.13953 7.87701 1.13962 7.87896 1.13978 7.88103C1.14007 7.88512 1.14059 7.88995 1.14151 7.89535C1.14323 7.90545 1.14694 7.92115 1.15585 7.93861C1.16508 7.95672 1.18114 7.97896 1.20762 7.99626C1.2349 8.01409 1.26428 8.02081 1.29011 8.02081V7.72081ZM1.43197 7.82354C0.623164 5.34647 1.53102 2.26869 4.3994 1.36184L4.30896 1.0758C1.23531 2.04755 0.302663 5.33142 1.14679 7.91665L1.43197 7.82354ZM4.39955 1.36179C5.7527 0.932384 7.22762 1.12136 8.42 1.85949L8.57791 1.60441C7.31141 0.820401 5.74571 0.619858 4.30881 1.07585L4.39955 1.36179ZM8.57801 1.85943C9.73213 1.14371 11.2694 0.945205 12.5951 1.36192L12.685 1.07572C11.2763 0.632908 9.64845 0.842602 8.4199 1.60447L8.57801 1.85943ZM12.5948 1.36184C15.4664 2.27018 16.3769 5.34745 15.5689 7.82356L15.8541 7.91663C16.6975 5.33188 15.7617 2.04893 12.6853 1.07581L12.5948 1.36184ZM15.5686 7.8243C14.9453 9.76841 13.2952 11.4801 11.7526 12.7288C10.2142 13.974 8.80513 14.7411 8.69378 14.8011L8.83606 15.0652C8.9555 15.0009 10.3826 14.2236 11.9413 12.9619C13.4957 11.7037 15.2034 9.94602 15.8543 7.91589L15.5686 7.8243ZM8.69334 14.8013C8.6337 14.8337 8.56752 14.85 8.50115 14.85V15.15C8.61648 15.15 8.73201 15.1217 8.83649 15.065L8.69334 14.8013Z"
                                                        fill="currentColor" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209"
                                                        stroke="currentColor" stroke-width="0.3" />
                                                </svg>
                                            @endif
                                        </span>

                                        Thêm danh sách mong muốn

                                    </button>
                                @else
                                    <button type="button" class="tp-product-details-action-sm-btn"
                                        id="wishlist-button-{{ $sanpham->id }}" onclick="PleaseLogin()">
                                        <span id="wishlist-icon-{{ $sanpham->id }}">
                                            @if (isset($isLoved[$sanpham->id]) && $isLoved[$sanpham->id])
                                                <svg width="20" height="19" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c2.04 0 3.99.81 5.5 2.09C15.51 3.81 17.46 3 19.5 3 22.58 3 25 5.42 25 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                                        fill="currentColor" />
                                                </svg>
                                            @else
                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.33541 7.54172C3.36263 10.6766 7.42094 13.2113 8.49945 13.8387C9.58162 13.2048 13.6692 10.6421 14.6635 7.5446C15.3163 5.54239 14.7104 3.00621 12.3028 2.24514C11.1364 1.8779 9.77578 2.1014 8.83648 2.81432C8.64012 2.96237 8.36757 2.96524 8.16974 2.81863C7.17476 2.08487 5.87499 1.86999 4.69024 2.24514C2.28632 3.00549 1.68259 5.54167 2.33541 7.54172ZM8.50115 15C8.4103 15 8.32018 14.9784 8.23812 14.9346C8.00879 14.8117 2.60674 11.891 1.29011 7.87081C1.28938 7.87081 1.28938 7.8701 1.28938 7.8701C0.462913 5.33895 1.38316 2.15812 4.35418 1.21882C5.7492 0.776121 7.26952 0.97088 8.49895 1.73195C9.69029 0.993159 11.2729 0.789057 12.6401 1.21882C15.614 2.15956 16.5372 5.33966 15.7115 7.8701C14.4373 11.8443 8.99571 14.8088 8.76492 14.9332C8.68286 14.9777 8.592 15 8.50115 15Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.49945 13.8387L8.42402 13.9683L8.49971 14.0124L8.57526 13.9681L8.49945 13.8387ZM14.6635 7.5446L14.5209 7.4981L14.5207 7.49875L14.6635 7.5446ZM12.3028 2.24514L12.348 2.10211L12.3478 2.10206L12.3028 2.24514ZM8.83648 2.81432L8.92678 2.93409L8.92717 2.9338L8.83648 2.81432ZM8.16974 2.81863L8.25906 2.69812L8.25877 2.69791L8.16974 2.81863ZM4.69024 2.24514L4.73548 2.38815L4.73552 2.38814L4.69024 2.24514ZM8.23812 14.9346L8.16727 15.0668L8.16744 15.0669L8.23812 14.9346ZM1.29011 7.87081L1.43266 7.82413L1.39882 7.72081H1.29011V7.87081ZM1.28938 7.8701L1.43938 7.87009L1.43938 7.84623L1.43197 7.82354L1.28938 7.8701ZM4.35418 1.21882L4.3994 1.36184L4.39955 1.36179L4.35418 1.21882ZM8.49895 1.73195L8.42 1.85949L8.49902 1.90841L8.57801 1.85943L8.49895 1.73195ZM12.6401 1.21882L12.6853 1.0758L12.685 1.07572L12.6401 1.21882ZM15.7115 7.8701L15.5689 7.82356L15.5686 7.8243L15.7115 7.8701ZM8.76492 14.9332L8.69378 14.8011L8.69334 14.8013L8.76492 14.9332ZM2.19287 7.58843C2.71935 9.19514 4.01596 10.6345 5.30013 11.744C6.58766 12.8564 7.88057 13.6522 8.42402 13.9683L8.57487 13.709C8.03982 13.3978 6.76432 12.6125 5.49626 11.517C4.22484 10.4185 2.97868 9.02313 2.47795 7.49501L2.19287 7.58843ZM8.57526 13.9681C9.12037 13.6488 10.4214 12.8444 11.7125 11.729C12.9999 10.6167 14.2963 9.17932 14.8063 7.59044L14.5207 7.49875C14.0364 9.00733 12.7919 10.4 11.5164 11.502C10.2446 12.6008 8.9607 13.3947 8.42364 13.7093L8.57526 13.9681ZM14.8061 7.59109C15.1419 6.5613 15.1554 5.39131 14.7711 4.37633C14.3853 3.35729 13.5989 2.49754 12.348 2.10211L12.2576 2.38816C13.4143 2.75381 14.1347 3.54267 14.4905 4.48255C14.8479 5.42648 14.8379 6.52568 14.5209 7.4981L14.8061 7.59109ZM12.3478 2.10206C11.137 1.72085 9.72549 1.95125 8.7458 2.69484L8.92717 2.9338C9.82606 2.25155 11.1357 2.03494 12.2577 2.38821L12.3478 2.10206ZM8.74618 2.69455C8.60221 2.8031 8.40275 2.80462 8.25906 2.69812L8.08043 2.93915C8.33238 3.12587 8.67804 3.12163 8.92678 2.93409L8.74618 2.69455ZM8.25877 2.69791C7.225 1.93554 5.87527 1.71256 4.64496 2.10213L4.73552 2.38814C5.87471 2.02742 7.12452 2.2342 8.08071 2.93936L8.25877 2.69791ZM4.64501 2.10212C3.39586 2.49722 2.61099 3.35688 2.22622 4.37554C1.84299 5.39014 1.85704 6.55957 2.19281 7.58826L2.478 7.49518C2.16095 6.52382 2.15046 5.42513 2.50687 4.48154C2.86175 3.542 3.58071 2.7534 4.73548 2.38815L4.64501 2.10212ZM8.50115 14.85C8.43415 14.85 8.36841 14.8341 8.3088 14.8023L8.16744 15.0669C8.27195 15.1227 8.38645 15.15 8.50115 15.15V14.85ZM8.30897 14.8024C8.19831 14.7431 6.7996 13.9873 5.26616 12.7476C3.72872 11.5046 2.07716 9.79208 1.43266 7.82413L1.14756 7.9175C1.81968 9.96978 3.52747 11.7277 5.07755 12.9809C6.63162 14.2373 8.0486 15.0032 8.16727 15.0668L8.30897 14.8024ZM1.29011 7.72081C1.31557 7.72081 1.34468 7.72745 1.37175 7.74514C1.39802 7.76231 1.41394 7.78437 1.42309 7.8023C1.43191 7.81958 1.43557 7.8351 1.43727 7.84507C1.43817 7.8504 1.43869 7.85518 1.43898 7.85922C1.43913 7.86127 1.43923 7.8632 1.43929 7.865C1.43932 7.86591 1.43934 7.86678 1.43936 7.86763C1.43936 7.86805 1.43937 7.86847 1.43937 7.86888C1.43937 7.86909 1.43937 7.86929 1.43938 7.86949C1.43938 7.86959 1.43938 7.86969 1.43938 7.86979C1.43938 7.86984 1.43938 7.86992 1.43938 7.86994C1.43938 7.87002 1.43938 7.87009 1.28938 7.8701C1.13938 7.8701 1.13938 7.87017 1.13938 7.87025C1.13938 7.87027 1.13938 7.87035 1.13938 7.8704C1.13938 7.8705 1.13938 7.8706 1.13938 7.8707C1.13938 7.8709 1.13938 7.87111 1.13938 7.87131C1.13939 7.87173 1.13939 7.87214 1.1394 7.87257C1.13941 7.87342 1.13943 7.8743 1.13946 7.8752C1.13953 7.87701 1.13962 7.87896 1.13978 7.88103C1.14007 7.88512 1.14059 7.88995 1.14151 7.89535C1.14323 7.90545 1.14694 7.92115 1.15585 7.93861C1.16508 7.95672 1.18114 7.97896 1.20762 7.99626C1.2349 8.01409 1.26428 8.02081 1.29011 8.02081V7.72081ZM1.43197 7.82354C0.623164 5.34647 1.53102 2.26869 4.3994 1.36184L4.30896 1.0758C1.23531 2.04755 0.302663 5.33142 1.14679 7.91665L1.43197 7.82354ZM4.39955 1.36179C5.7527 0.932384 7.22762 1.12136 8.42 1.85949L8.57791 1.60441C7.31141 0.820401 5.74571 0.619858 4.30881 1.07585L4.39955 1.36179ZM8.57801 1.85943C9.73213 1.14371 11.2694 0.945205 12.5951 1.36192L12.685 1.07572C11.2763 0.632908 9.64845 0.842602 8.4199 1.60447L8.57801 1.85943ZM12.5948 1.36184C15.4664 2.27018 16.3769 5.34745 15.5689 7.82356L15.8541 7.91663C16.6975 5.33188 15.7617 2.04893 12.6853 1.07581L12.5948 1.36184ZM15.5686 7.8243C14.9453 9.76841 13.2952 11.4801 11.7526 12.7288C10.2142 13.974 8.80513 14.7411 8.69378 14.8011L8.83606 15.0652C8.9555 15.0009 10.3826 14.2236 11.9413 12.9619C13.4957 11.7037 15.2034 9.94602 15.8543 7.91589L15.5686 7.8243ZM8.69334 14.8013C8.6337 14.8337 8.56752 14.85 8.50115 14.85V15.15C8.61648 15.15 8.73201 15.1217 8.83649 15.065L8.69334 14.8013Z"
                                                        fill="currentColor" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209"
                                                        stroke="currentColor" stroke-width="0.3" />
                                                </svg>
                                            @endif
                                        </span>

                                        Thêm danh sách sản phẩm yêu thích

                                    </button>
                                @endif

                            </div>
                            <div class="tp-product-details-query">
                                <div class="tp-product-details-query-item d-flex align-items-center">
                                    <span>Mã sản phẩm: </span>
                                    <p>{{ $sanpham->ma_san_pham }}</p>
                                </div>
                                <div class="tp-product-details-query-item d-flex align-items-center">
                                    <span>Danh mục: </span>
                                    <p>
                                        <a
                                            href="{{ route('sanpham.danhmuc', ['danh_muc_id' => $sanpham->danhMuc->id]) }}">
                                            {{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}
                                        </a>
                                    </p>
                                </div>
                                <div class="tp-product-details-query-item d-flex align-items-center">
                                    <span>Tag: </span>
                                    <p>

                                    <p>
                                        @foreach ($tagsanphams as $tag)
                                            @if ($tag->tag->trang_thai == 1)
                                                <span class="badge bg-primary">#{{ $tag->tag->ten_tag }}</span>
                                            @endif
                                        @endforeach
                                    </p>
                                    <p>
                                        @foreach ($tagsanphams as $tag)
                                            @if ($tag->tag->trang_thai == 1)
                                                <span class="badge bg-primary"><a
                                                        href="{{ route('sanphamtag', $tag->tag->id) }}">#{{ $tag->tag->ten_tag }}</a></span>
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="tp-product-details-social">
                                <span>Chia sẻ: </span>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                            </div>

                            <div
                                class="tp-product-details-payment d-flex align-items-center flex-wrap justify-content-between">
                                <p>Thanh toán an toàn<br>và bảo mật</p>
                                <img src="{{ asset('assets/client/img/product/icons/payment-option.png') }}"
                                    alt="">
                                <style>
                                    .disabled {
                                        opacity: 0.5;
                                        pointer-events: none;
                                        /* Prevents click events */
                                    }
                                </style>

                                <!-- JavaScript để gọi AJAX -->
                                <script>
                                    let sanPhamId = {
                                        {
                                            $sanpham - > id
                                        }
                                    };
                                    let selectedMauSacId = null;
                                    let selectedDungLuongId = null;

                                    // Khởi tạo: Kiểm tra tất cả các nút dung lượng và màu sắc
                                    document.addEventListener('DOMContentLoaded', function() {
                                        checkCapacityButtons(); // Kiểm tra các nút dung lượng lúc đầu
                                        checkColorButtons(); // Kiểm tra các nút màu sắc lúc đầu
                                    });

                                    document.querySelectorAll('.tp-color-variation-btn').forEach(button => {
                                        button.addEventListener('click', function() {
                                            selectedMauSacId = this.getAttribute('data-mau-sac-id');
                                            fetchPrice();
                                            checkCapacityButtons(); // Kiểm tra các nút dung lượng
                                        });
                                    });

                                    document.querySelectorAll('.tp-size-variation-btn').forEach(button => {
                                        button.addEventListener('click', function() {
                                            selectedDungLuongId = this.getAttribute('data-dung-luong-id');
                                            fetchPrice();
                                            checkColorButtons(); // Kiểm tra các nút màu sắc
                                        });
                                    });

                                    function fetchPrice() {
                                        if (selectedMauSacId && selectedDungLuongId) {
                                            $.ajax({
                                                url: '{{ route('sanpham.lay_gia_bien_the') }}',
                                                method: 'GET',
                                                data: {
                                                    san_pham_id: sanPhamId,
                                                    mau_sac_id: selectedMauSacId,
                                                    dung_luong_id: selectedDungLuongId
                                                },
                                                success: function(response) {
                                                    if (response.status === 'success') {
                                                        // Cập nhật giá mới và giá cũ với ký hiệu $
                                                        document.getElementById('new-price').innerText = '$' + response.gia_moi.toFixed(2);
                                                        document.getElementById('old-price').innerText = '$' + response.gia_cu.toFixed(
                                                            2); // Cập nhật giá cũ
                                                    } else {
                                                        alert(response.message);
                                                    }
                                                },
                                                error: function() {
                                                    alert('Đã xảy ra lỗi khi tải giá.');
                                                }
                                            });
                                        }
                                    }


                                    // Kiểm tra các nút dung lượng dựa trên màu sắc đã chọn
                                    function checkCapacityButtons() {
                                        document.querySelectorAll('.tp-size-variation-btn').forEach(button => {
                                            const dungLuongId = button.getAttribute('data-dung-luong-id');
                                            // Nếu không chọn màu thì cho phép chọn tất cả dung lượng
                                            if (!selectedMauSacId) {
                                                button.classList.remove('disabled');
                                                return;
                                            }
                                            $.ajax({
                                                url: '{{ route('sanpham.lay_gia_bien_the') }}',
                                                method: 'GET',
                                                data: {
                                                    san_pham_id: sanPhamId,
                                                    mau_sac_id: selectedMauSacId,
                                                    dung_luong_id: dungLuongId
                                                },
                                                success: function(response) {
                                                    if (response.status === 'success') {
                                                        button.classList.remove('disabled'); // Bỏ vô hiệu hóa nút nếu có biến thể
                                                    } else {
                                                        button.classList.add('disabled'); // Vô hiệu hóa nút nếu không có biến thể
                                                    }
                                                }
                                            });
                                        });
                                    }

                                    // Kiểm tra các nút màu sắc dựa trên dung lượng đã chọn
                                    function checkColorButtons() {
                                        document.querySelectorAll('.tp-color-variation-btn').forEach(button => {
                                            const mauSacId = button.getAttribute('data-mau-sac-id');
                                            // Nếu không chọn dung lượng thì cho phép chọn tất cả màu
                                            if (!selectedDungLuongId) {
                                                button.classList.remove('disabled');
                                                return;
                                            }
                                            $.ajax({
                                                url: '{{ route('sanpham.lay_gia_bien_the') }}',
                                                method: 'GET',
                                                data: {
                                                    san_pham_id: sanPhamId,
                                                    mau_sac_id: mauSacId,
                                                    dung_luong_id: selectedDungLuongId
                                                },
                                                success: function(response) {
                                                    if (response.status === 'success') {
                                                        button.classList.remove('disabled'); // Bỏ vô hiệu hóa nút nếu có biến thể
                                                    } else {
                                                        button.classList.add('disabled'); // Vô hiệu hóa nút nếu không có biến thể
                                                    }
                                                }
                                            });
                                        });
                                    }
                                </script>




                            </div>

                            <!-- actions -->
                        </div>
                    </div>
                    <div class="tp-product-details-bottom pb-140">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="tp-product-details-tab-nav tp-tab">
                                        <nav>
                                            <div class="nav nav-tabs justify-content-center p-relative tp-product-tab"
                                                style="margin-top: 100px;" id="navPresentationTab" role="tablist">
                                                <button class="nav-link" id="nav-description-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-description" type="button" role="tab"
                                                    aria-controls="nav-description" aria-selected="true">Mô tả</button>
                                                <button class="nav-link active" id="nav-addInfo-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-addInfo" type="button" role="tab"
                                                    aria-controls="nav-addInfo" aria-selected="false">Thông tin sản
                                                    phẩm</button>
                                                <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-review" type="button" role="tab"
                                                    aria-controls="nav-review" aria-selected="false">
                                                    Đánh giá
                                                </button>
                                                <span id="productTabMarker" class="tp-product-details-tab-line"></span>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="navPresentationTabContent">
                                            <div class="tab-pane fade" id="nav-description" role="tabpanel"
                                                aria-labelledby="nav-description-tab" tabindex="0">
                                                <div class="tp-product-details-desc-wrapper pt-80">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-10">
                                                            <div class="tp-product-details-desc-item">
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div
                                                                            class="tp-product-details-desc-banner text-center m-img">
                                                                            <h3 class="text-black">
                                                                                {!! $sanpham->mo_ta !!}
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show active" id="nav-addInfo" role="tabpanel"
                                                aria-labelledby="nav-addInfo-tab" tabindex="0">

                                                <div class="tp-product-details-additional-info ">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-10">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Mã sản phẩm</td>
                                                                        <td>{{ $sanpham->ma_san_pham }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tên sản phẩm</td>
                                                                        <td>{{ $sanpham->ten_san_pham }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Danh mục sản phẩm</td>
                                                                        <td>{{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Lượt xem sản phẩm</td>
                                                                        <td>{{ $sanpham->luot_xem }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Sản phẩm đã bán</td>
                                                                        <td>{{ $sanpham->da_ban }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Color</td>
                                                                        <td>
                                                                            @php
                                                                                $displayedColors = [];
                                                                            @endphp

                                                                            @foreach ($bienthesanphams as $bienThe)
                                                                                @if (
                                                                                    $bienThe->mauSac &&
                                                                                        $bienThe->mauSac->trang_thai === 1 &&
                                                                                        !in_array($bienThe->mauSac->ten_mau_sac, $displayedColors))
                                                                                    @php
                                                                                        $displayedColors[] =
                                                                                            $bienThe->mauSac->ten_mau_sac;
                                                                                    @endphp
                                                                                @endif
                                                                            @endforeach

                                                                            {{ implode(', ', $displayedColors) }}
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>Dung lượng</td>
                                                                        <td>@php
                                                                            $displayedCapacities = []; // Mảng để theo dõi các dung lượng đã hiển thị
                                                                        @endphp

                                                                            @foreach ($bienthesanphams as $bienThe)
                                                                                @if ($bienThe->dungLuong && !in_array($bienThe->dungLuong->ten_dung_luong, $displayedCapacities))
                                                                                    @php
                                                                                        $displayedCapacities[] =
                                                                                            $bienThe->dungLuong->ten_dung_luong; // Thêm dung lượng vào mảng đã hiển thị
                                                                                    @endphp
                                                                                @endif
                                                                            @endforeach

                                                                            <!-- Hiển thị các dung lượng đã thu thập và nối bằng dấu phẩy -->
                                                                            {{ implode(', ', $displayedCapacities) }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <tr>
                                                                        <td>Tag</td>
                                                                        <td>
                                                                            @foreach ($tagsanphams as $index => $tag)
                                                                                #{{ $tag->tag->ten_tag }}@if ($index < count($tagsanphams) - 1)
                                                                                    ,
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                    </tr>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>Độ phân giải</td>
                                                                        <td>1920 x 1200 Pixels</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Độ phân giải tối đa</td>
                                                                        <td>2000 x 1200</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-review" role="tabpanel"
                                                aria-labelledby="nav-review-tab" tabindex="0">
                                                <div class="tp-product-details-review-wrapper pt-60">
                                                    <div class="row">
                                                        <div class="">
                                                            <div class="tp-product-details-review-statics">
                                                                <!-- number -->


                                                                {{-- Bảng người dùng xem đánh giá --}}
                                                                <div
                                                                    class="tp-product-details-review-number d-inline-block mb-50">

                                                                    <h3 class="tp-product-details-review-number-title">Đánh
                                                                        giá của khách hàng</h3>
                                                                    <div
                                                                        class="tp-product-details-review-summery d-flex align-items-center">
                                                                        @if ($soluotdanhgia > 0)
                                                                            <div
                                                                                class="tp-product-details-review-summery-value">
                                                                                <span>{{ number_format($diemtrungbinh, 1) }}</span>
                                                                            </div>



                                                                            <div
                                                                                class="tp-product-details-review-summery-rating d-flex align-items-center">


                                                                                <div class="star_warning">

                                                                                    <p class="fs-2">
                                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                                            @if ($i <= floor($diemtrungbinh))
                                                                                                <span
                                                                                                    class="star text-warning">★</span>
                                                                                            @elseif($i == ceil($diemtrungbinh) && $diemtrungbinh - floor($diemtrungbinh) >= 0.3)
                                                                                                <span
                                                                                                    class="star text-warning">☆</span>
                                                                                            @else
                                                                                                <span
                                                                                                    class="star text-warning">☆</span>
                                                                                            @endif
                                                                                        @endfor
                                                                                    </p>

                                                                                </div>

                                                                                <p class="ms-auto">({{ $soluotdanhgia }}
                                                                                    lượt
                                                                                    đánh giá)</p>
                                                                            </div>
                                                                        @endif

                                                                    </div>





                                                                    <div class="tp-product-details-review-rating-list">

                                                                        <!-- single item -->


                                                                    </div>
                                                                </div>
                                                                {{-- Bảng người dùng xem đánh giá --}}
                                                                <div class="tp-product-details-review-list pr-110">
                                                                    <h3 class="tp-product-details-review-title">Đánh giá &
                                                                        Nhận xét</h3>

                                                                    @foreach ($danhgias as $danhgia)
                                                                        <br>
                                                                        <hr style="width: 80%;">
                                                                        @if ($danhgia->user)
                                                                            <div
                                                                                class="tp-product-details-review-avater-thumb">
                                                                                <a href="">
                                                                                    <img src="{{ asset('storage/' . $danhgia->user->anh_dai_dien) }}"
                                                                                        alt="">
                                                                                    <div class="review-info">
                                                                                        <div>
                                                                                            <h3
                                                                                                class="tp-product-details-review-avater-title">
                                                                                                {{ $danhgia->user->ten }} -
                                                                                            </h3>
                                                                                            <span>{{ $danhgia->created_at ? $danhgia->created_at->format('H:i d/m/Y') : 'Chưa xác định' }}</span>
                                                                                        </div>
                                                                                        <div>
                                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                                <span
                                                                                                    class="{{ $i <= $danhgia->diem_so ? 'text-warning' : 'text-muted' }}">★</span>
                                                                                            @endfor
                                                                                        </div>
                                                                                        <!-- <div>
                                                                                        <span>Phân loại hàng:</span>
                                                                                        @if ($danhgia->bienTheDaMua->isNotEmpty())
    @foreach ($danhgia->bienTheDaMua as $index => $bienThe)
    {{ $bienThe->mauSac->ten_mau_sac ?? 'Không xác định' }} - {{ $bienThe->dungLuong->ten_dung_luong ?? 'Không xác định' }}
                                                                                                @if ($index < $danhgia->bienTheDaMua->count() - 1)
    ,
    @endif
    @endforeach
@else
    <p>Không có biến thể nào được mua từ sản phẩm này.</p>
    @endif
                                                                                    </div> -->
                                                                                    </div>
                                                                                </a>
                                                                                <style>
                                                                                    a {
                                                                                        display: flex;
                                                                                        /* Arrange img and div next to each other */
                                                                                        align-items: flex-start;
                                                                                        /* Align vertically at the top */
                                                                                    }

                                                                                    .review-info {
                                                                                        margin-left: 10px;
                                                                                        /* Add some space between image and review info */
                                                                                        display: flex;
                                                                                        flex-direction: column;
                                                                                        /* Stack content vertically inside the div */
                                                                                    }

                                                                                    .tp-product-details-review-avater-title {
                                                                                        margin-bottom: 5px;
                                                                                        /* Add spacing between the name and the date */
                                                                                    }

                                                                                    .review-info div {
                                                                                        margin-bottom: 5px;
                                                                                        /* Add spacing between each section (name, stars, etc.) */
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div
                                                                                class="tp-product-details-review-avater-content">
                                                                                <h3 class="tp-product-details-review-avater-title"
                                                                                    style=" font-size: 20px; margin-left: 20px; ">
                                                                                    {{ $danhgia->nhan_xet }}</h3>
                                                                                {{-- Hiển thị câu trả lời nếu có --}}
                                                                                @foreach ($danhgia->traLois as $traLoi)
                                                                                    <div class="tp-product-details-review-reply ml-4"
                                                                                        style="background-color: 	#ededed;">

                                                                                        <span class="text-muted">
                                                                                            <p style="font-weight: bold;">
                                                                                                Phản hồi của Người Bán _
                                                                                                {{ $traLoi->created_at ? $traLoi->created_at->format('d/m/Y') : 'Chưa xác định' }}
                                                                                            </p>
                                                                                        </span>
                                                                                        <p>{{ $traLoi->noi_dung }}</p>

                                                                                    </div>
                                                                                @endforeach

                                                                            </div>
                                                                </div>
                                                                @endif
                                                                @endforeach

                                                            </div>



                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    // Nút sửa câu trả lời
                                                                    const editReplyButtons = document.querySelectorAll('.btn-edit-reply');
                                                                    editReplyButtons.forEach(button => {
                                                                        button.addEventListener('click', function() {
                                                                            const replyId = this.dataset.replyId;
                                                                            const form = this.nextElementSibling; // Form sửa
                                                                            if (form) {
                                                                                form.classList.remove('d-none'); // Hiển thị form sửa
                                                                                this.style.display = 'none'; // Ẩn nút sửa
                                                                            }
                                                                        });
                                                                    });

                                                                    // Nút hủy sửa câu trả lời
                                                                    const cancelEditButtons = document.querySelectorAll('.btn-cancel-edit');
                                                                    cancelEditButtons.forEach(button => {
                                                                        button.addEventListener('click', function() {
                                                                            const form = this.closest('.edit-reply-form');
                                                                            const editButton = form.previousElementSibling;
                                                                            if (form && editButton) {
                                                                                form.classList.add('d-none'); // Ẩn form sửa
                                                                                editButton.style.display = ''; // Hiển thị lại nút sửa
                                                                            }
                                                                        });
                                                                    });

                                                                    // Nút trả lời
                                                                    const replyButtons = document.querySelectorAll('.btn-reply');
                                                                    replyButtons.forEach(button => {
                                                                        button.addEventListener('click', function() {
                                                                            const reviewId = this.dataset.reviewId;
                                                                            const form = this.nextElementSibling;
                                                                            if (form) {
                                                                                form.classList.remove('d-none'); // Hiển thị form
                                                                                this.style.display = 'none'; // Ẩn nút trả lời
                                                                            }
                                                                        });
                                                                    });

                                                                    // Nút hủy trả lời
                                                                    const cancelButtons = document.querySelectorAll('.btn-cancel');
                                                                    cancelButtons.forEach(button => {
                                                                        button.addEventListener('click', function() {
                                                                            const form = this.closest('.reply-form');
                                                                            const replyButton = form.previousElementSibling;
                                                                            if (form && replyButton) {
                                                                                form.classList.add('d-none'); // Ẩn form
                                                                                replyButton.style.display = ''; // Hiển thị lại nút trả lời
                                                                            }
                                                                        });
                                                                    });
                                                                });
                                                            </script>

                                                            <style>
                                                                .tp-product-details-review-reply {
                                                                    margin-left: 20px;
                                                                    /* Thụt vào một chút */
                                                                    border-left: 2px solid #ddd;
                                                                    /* Thêm đường kẻ trái để làm nổi bật */
                                                                    padding-left: 10px;
                                                                    /* Thêm khoảng cách giữa đường kẻ và nội dung */
                                                                }

                                                                /* Thêm một chút style cho form sửa */
                                                                .edit-reply-form {
                                                                    margin-top: 10px;
                                                                }
                                                            </style>

                                                            {{-- form đánh giá và nhận xét --}}



                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






    </section>
    <!-- product details area end -->

    <!-- related product area start -->
    <section class="tp-related-product pt-95 pb-120">
        <div class="container">
            <div class="row">
                <div class="tp-section-title-wrapper-6 text-center mb-40">
                    <h3 class="tp-section-title-6">
                        Sản phẩm liên
                        quan</h3>
                </div>
            </div>
            <div class="row">
                <div class="tp-product-related-slider">
                    <div class="tp-product-related-slider-active swiper-container  mb-10">
                        <div class="swiper-wrapper">
                            @foreach ($sanPhamMoiNhat as $sanPham)
                                <div class="swiper-slide">
                                    <div class="tp-product-item-3 tp-product-style-primary mb-50">
                                        <div class="tp-product-thumb-3 mb-15 fix p-relative z-index-1">
                                            <a href="{{ route('chitietsanpham', ['id' => $sanPham->id]) }}">
                                                <img src="{{ asset($sanPham->anh_san_pham) }}"
                                                    alt="{{ $sanPham->ten_san_pham }}">
                                            </a>

                                            <!-- product action -->
                                            <div
                                                class="tp-product-action-3 tp-product-action-4 has-shadow tp-product-action-primaryStyle">
                                                <div class="tp-product-action-item-3 d-flex flex-column">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tp-product-content-3">
                                            <div class="tp-product-tag-3">
                                                <span>{{ $sanPham->danhMuc ? $sanPham->danhMuc->ten_danh_muc : '' }}</span>
                                            </div>
                                            <h3 class="tp-product-title-3">
                                                <a
                                                    href="{{ route('chitietsanpham', ['id' => $sanPham->id]) }}">{{ $sanPham->ten_san_pham }}</a>
                                            </h3>
                                            <div class="tp-product-price-wrapper-3">
                                                <span class="tp-product-price-3">
                                                    {{ $sanPham->bienthesanphams->first() ? number_format($sanPham->bienthesanphams->first()->gia_moi) : 'Giá không có sẵn' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tp-related-swiper-scrollbar tp-swiper-scrollbar">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related product area end -->

    <div class="modal fade tp-product-modal" id="producQuickViewModal" tabindex="-1"
        aria-labelledby="producQuickViewModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="tp-product-modal-content d-lg-flex align-items-start">
                    <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                        data-bs-target="#producQuickViewModal"><i class="fa-regular fa-xmark"></i></button>
                    <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                        <nav>
                            <div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
                                <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1"
                                    aria-selected="true">
                                    <img src="{{ asset('assets/client/img/product/details/nav/product-details-nav-1.jpg') }}"
                                        alt="">
                                </button>
                                <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2"
                                    type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                                    <img src="{{ asset('assets/client/img/product/details/nav/product-details-nav-2.jpg') }}"
                                        alt="">
                                </button>
                                <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3"
                                    type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                                    <img src="{{ asset('assets/client/img/product/details/nav/product-details-nav-3.jpg') }}"
                                        alt="">
                                </button>
                                <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4"
                                    type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                                    <img src="{{ asset('assets/client/img/product/details/nav/product-details-nav-4.jpg') }}"
                                        alt="">
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content m-img" id="productDetailsNavContent">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel"
                                aria-labelledby="nav-1-tab" tabindex="0">
                                <div class="tp-product-details-nav-main-thumb">
                                    <img src="{{ asset('assets/client/img/product/details/main/product-details-main-1.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab"
                                tabindex="0">
                                <div class="tp-product-details-nav-main-thumb">
                                    <img src="{{ asset('assets/client/img/product/details/main/product-details-main-2.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab"
                                tabindex="0">
                                <div class="tp-product-details-nav-main-thumb">
                                    <img src="{{ asset('assets/client/img/product/details/main/product-details-main-3.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab"
                                tabindex="0">
                                <div class="tp-product-details-nav-main-thumb">
                                    <img src="{{ asset('assets/client/img/product/details/main/product-details-main-4.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-product-details-wrapper">
                        <div class="tp-product-details-category">
                            <span>Computers
                                &
                                Tablets</span>
                        </div>
                        <h3 class="tp-product-details-title">
                            Samsung
                            galaxy A8
                            tablet</h3>

                        <!-- inventory details -->
                        <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                            <div class="tp-product-details-stock mb-10">
                                <span>Đánh
                                    giá</span>
                            </div>
                            <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                <div class="tp-product-details-rating">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="tp-product-details-reviews">
                                    <span>(36
                                        Reviews)</span>
                                </div>
                            </div>
                        </div>
                        <p>A Screen
                            Everyone
                            Will Love:
                            Whether your
                            family is
                            streaming or
                            video
                            chatting
                            with friends
                            tablet
                            A8...
                            <span>See
                                more</span>
                        </p>

                        <!-- price -->
                        <div class="tp-product-details-price-wrapper mb-20">
                            <span class="tp-product-details-price old-price">$320.00</span>
                            <span class="tp-product-details-price new-price">$236.00</span>
                        </div>

                        <!-- variations -->
                        <div class="tp-product-details-variation">
                            <!-- single item -->
                            <div class="tp-product-details-variation-item">
                                <h4 class="tp-product-details-variation-title">
                                    Color
                                    :
                                </h4>
                                <div class="tp-product-details-variation-list">
                                    <button type="button" class="color tp-color-variation-btn">
                                        <span data-bg-color="#F8B655"></span>
                                        <span class="tp-color-variation-tootltip">Yellow</span>
                                    </button>
                                    <button type="button" class="color tp-color-variation-btn active">
                                        <span data-bg-color="#CBCBCB"></span>
                                        <span class="tp-color-variation-tootltip">Gray</span>
                                    </button>
                                    <button type="button" class="color tp-color-variation-btn">
                                        <span data-bg-color="#494E52"></span>
                                        <span class="tp-color-variation-tootltip">Black</span>
                                    </button>
                                    <button type="button" class="color tp-color-variation-btn">
                                        <span data-bg-color="#B4505A"></span>
                                        <span class="tp-color-variation-tootltip">Brown</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- actions -->
                        <div class="tp-product-details-action-wrapper">
                            <h3 class="tp-product-details-action-title">
                                Quantity
                            </h3>
                            <div class="tp-product-details-action-item-wrapper d-sm-flex align-items-center">
                                <div class="tp-product-details-quantity">
                                    <div class="tp-product-quantity mb-15 mr-15">
                                        <span class="tp-cart-minus">
                                            <svg width="11" height="2" viewBox="0 0 11 2" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1H10" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <input class="tp-cart-input" type="text" value="1">
                                        <span class="tp-cart-plus">
                                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6H10" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="tp-product-details-add-to-cart mb-15 w-100">
                                    <button class="tp-product-details-add-to-cart-btn w-100">Thêm
                                        vào
                                        giỏ
                                        hàng</button>
                                </div>
                            </div>
                            <button class="tp-product-details-buy-now-btn w-100">Mua
                                ngay</button>
                        </div>
                        <div class="tp-product-details-action-sm">
                            <button type="button" class="tp-product-details-action-sm-btn">
                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 3.16431H10.8622C12.0451 3.16431 12.9999 4.08839 12.9999 5.23315V7.52268"
                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3.25177 0.985168L1 3.16433L3.25177 5.34354" stroke="currentColor"
                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12.9999 12.5983H3.13775C1.95486 12.5983 1 11.6742 1 10.5295V8.23993"
                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.748 14.7774L12.9998 12.5983L10.748 10.4191" stroke="currentColor"
                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Compare
                            </button>
                            <button type="button" class="tp-product-details-action-sm-btn">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.33541 7.54172C3.36263 10.6766 7.42094 13.2113 8.49945 13.8387C9.58162 13.2048 13.6692 10.6421 14.6635 7.5446C15.3163 5.54239 14.7104 3.00621 12.3028 2.24514C11.1364 1.8779 9.77578 2.1014 8.83648 2.81432C8.64012 2.96237 8.36757 2.96524 8.16974 2.81863C7.17476 2.08487 5.87499 1.86999 4.69024 2.24514C2.28632 3.00549 1.68259 5.54167 2.33541 7.54172ZM8.50115 15C8.4103 15 8.32018 14.9784 8.23812 14.9346C8.00879 14.8117 2.60674 11.891 1.29011 7.87081C1.28938 7.87081 1.28938 7.8701 1.28938 7.8701C0.462913 5.33895 1.38316 2.15812 4.35418 1.21882C5.7492 0.776121 7.26952 0.97088 8.49895 1.73195C9.69029 0.993159 11.2729 0.789057 12.6401 1.21882C15.614 2.15956 16.5372 5.33966 15.7115 7.8701C14.4373 11.8443 8.99571 14.8088 8.76492 14.9332C8.68286 14.9777 8.592 15 8.50115 15Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8.49945 13.8387L8.42402 13.9683L8.49971 14.0124L8.57526 13.9681L8.49945 13.8387ZM14.6635 7.5446L14.5209 7.4981L14.5207 7.49875L14.6635 7.5446ZM12.3028 2.24514L12.348 2.10211L12.3478 2.10206L12.3028 2.24514ZM8.83648 2.81432L8.92678 2.93409L8.92717 2.9338L8.83648 2.81432ZM8.16974 2.81863L8.25906 2.69812L8.25877 2.69791L8.16974 2.81863ZM4.69024 2.24514L4.73548 2.38815L4.73552 2.38814L4.69024 2.24514ZM8.23812 14.9346L8.16727 15.0668L8.16744 15.0669L8.23812 14.9346ZM1.29011 7.87081L1.43266 7.82413L1.39882 7.72081H1.29011V7.87081ZM1.28938 7.8701L1.43938 7.87009L1.43938 7.84623L1.43197 7.82354L1.28938 7.8701ZM4.35418 1.21882L4.3994 1.36184L4.39955 1.36179L4.35418 1.21882ZM8.49895 1.73195L8.42 1.85949L8.49902 1.90841L8.57801 1.85943L8.49895 1.73195ZM12.6401 1.21882L12.6853 1.0758L12.685 1.07572L12.6401 1.21882ZM15.7115 7.8701L15.5689 7.82356L15.5686 7.8243L15.7115 7.8701ZM8.76492 14.9332L8.69378 14.8011L8.69334 14.8013L8.76492 14.9332ZM2.19287 7.58843C2.71935 9.19514 4.01596 10.6345 5.30013 11.744C6.58766 12.8564 7.88057 13.6522 8.42402 13.9683L8.57487 13.709C8.03982 13.3978 6.76432 12.6125 5.49626 11.517C4.22484 10.4185 2.97868 9.02313 2.47795 7.49501L2.19287 7.58843ZM8.57526 13.9681C9.12037 13.6488 10.4214 12.8444 11.7125 11.729C12.9999 10.6167 14.2963 9.17932 14.8063 7.59044L14.5207 7.49875C14.0364 9.00733 12.7919 10.4 11.5164 11.502C10.2446 12.6008 8.9607 13.3947 8.42364 13.7093L8.57526 13.9681ZM14.8061 7.59109C15.1419 6.5613 15.1554 5.39131 14.7711 4.37633C14.3853 3.35729 13.5989 2.49754 12.348 2.10211L12.2576 2.38816C13.4143 2.75381 14.1347 3.54267 14.4905 4.48255C14.8479 5.42648 14.8379 6.52568 14.5209 7.4981L14.8061 7.59109ZM12.3478 2.10206C11.137 1.72085 9.72549 1.95125 8.7458 2.69484L8.92717 2.9338C9.82606 2.25155 11.1357 2.03494 12.2577 2.38821L12.3478 2.10206ZM8.74618 2.69455C8.60221 2.8031 8.40275 2.80462 8.25906 2.69812L8.08043 2.93915C8.33238 3.12587 8.67804 3.12163 8.92678 2.93409L8.74618 2.69455ZM8.25877 2.69791C7.225 1.93554 5.87527 1.71256 4.64496 2.10213L4.73552 2.38814C5.87471 2.02742 7.12452 2.2342 8.08071 2.93936L8.25877 2.69791ZM4.64501 2.10212C3.39586 2.49722 2.61099 3.35688 2.22622 4.37554C1.84299 5.39014 1.85704 6.55957 2.19281 7.58826L2.478 7.49518C2.16095 6.52382 2.15046 5.42513 2.50687 4.48154C2.86175 3.542 3.58071 2.7534 4.73548 2.38815L4.64501 2.10212ZM8.50115 14.85C8.43415 14.85 8.36841 14.8341 8.3088 14.8023L8.16744 15.0669C8.27195 15.1227 8.38645 15.15 8.50115 15.15V14.85ZM8.30897 14.8024C8.19831 14.7431 6.7996 13.9873 5.26616 12.7476C3.72872 11.5046 2.07716 9.79208 1.43266 7.82413L1.14756 7.9175C1.81968 9.96978 3.52747 11.7277 5.07755 12.9809C6.63162 14.2373 8.0486 15.0032 8.16727 15.0668L8.30897 14.8024ZM1.29011 7.72081C1.31557 7.72081 1.34468 7.72745 1.37175 7.74514C1.39802 7.76231 1.41394 7.78437 1.42309 7.8023C1.43191 7.81958 1.43557 7.8351 1.43727 7.84507C1.43817 7.8504 1.43869 7.85518 1.43898 7.85922C1.43913 7.86127 1.43923 7.8632 1.43929 7.865C1.43932 7.86591 1.43934 7.86678 1.43936 7.86763C1.43936 7.86805 1.43937 7.86847 1.43937 7.86888C1.43937 7.86909 1.43937 7.86929 1.43938 7.86949C1.43938 7.86959 1.43938 7.86969 1.43938 7.86979C1.43938 7.86984 1.43938 7.86992 1.43938 7.86994C1.43938 7.87002 1.43938 7.87009 1.28938 7.8701C1.13938 7.8701 1.13938 7.87017 1.13938 7.87025C1.13938 7.87027 1.13938 7.87035 1.13938 7.8704C1.13938 7.8705 1.13938 7.8706 1.13938 7.8707C1.13938 7.8709 1.13938 7.87111 1.13938 7.87131C1.13939 7.87173 1.13939 7.87214 1.1394 7.87257C1.13941 7.87342 1.13943 7.8743 1.13946 7.8752C1.13953 7.87701 1.13962 7.87896 1.13978 7.88103C1.14007 7.88512 1.14059 7.88995 1.14151 7.89535C1.14323 7.90545 1.14694 7.92115 1.15585 7.93861C1.16508 7.95672 1.18114 7.97896 1.20762 7.99626C1.2349 8.01409 1.26428 8.02081 1.29011 8.02081V7.72081ZM1.43197 7.82354C0.623164 5.34647 1.53102 2.26869 4.3994 1.36184L4.30896 1.0758C1.23531 2.04755 0.302663 5.33142 1.14679 7.91665L1.43197 7.82354ZM4.39955 1.36179C5.7527 0.932384 7.22762 1.12136 8.42 1.85949L8.57791 1.60441C7.31141 0.820401 5.74571 0.619858 4.30881 1.07585L4.39955 1.36179ZM8.57801 1.85943C9.73213 1.14371 11.2694 0.945205 12.5951 1.36192L12.685 1.07572C11.2763 0.632908 9.64845 0.842602 8.4199 1.60447L8.57801 1.85943ZM12.5948 1.36184C15.4664 2.27018 16.3769 5.34745 15.5689 7.82356L15.8541 7.91663C16.6975 5.33188 15.7617 2.04893 12.6853 1.07581L12.5948 1.36184ZM15.5686 7.8243C14.9453 9.76841 13.2952 11.4801 11.7526 12.7288C10.2142 13.974 8.80513 14.7411 8.69378 14.8011L8.83606 15.0652C8.9555 15.0009 10.3826 14.2236 11.9413 12.9619C13.4957 11.7037 15.2034 9.94602 15.8543 7.91589L15.5686 7.8243ZM8.69334 14.8013C8.6337 14.8337 8.56752 14.85 8.50115 14.85V15.15C8.61648 15.15 8.73201 15.1217 8.83649 15.065L8.69334 14.8013Z"
                                        fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209Z"
                                        fill="currentColor" />
                                    <path
                                        d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209"
                                        stroke="currentColor" stroke-width="0.3" />
                                </svg>
                                Add
                                Wishlist
                            </button>
                            <button type="button" class="tp-product-details-action-sm-btn">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.575 12.6927C8.775 12.6927 8.94375 12.6249 9.08125 12.4895C9.21875 12.354 9.2875 12.1878 9.2875 11.9907C9.2875 11.7937 9.21875 11.6275 9.08125 11.492C8.94375 11.3565 8.775 11.2888 8.575 11.2888C8.375 11.2888 8.20625 11.3565 8.06875 11.492C7.93125 11.6275 7.8625 11.7937 7.8625 11.9907C7.8625 12.1878 7.93125 12.354 8.06875 12.4895C8.20625 12.6249 8.375 12.6927 8.575 12.6927ZM8.55625 5.0638C8.98125 5.0638 9.325 5.17771 9.5875 5.40553C9.85 5.63335 9.98125 5.92582 9.98125 6.28294C9.98125 6.52924 9.90625 6.77245 9.75625 7.01258C9.60625 7.25272 9.3625 7.5144 9.025 7.79763C8.7 8.08087 8.44063 8.3795 8.24688 8.69352C8.05313 9.00754 7.95625 9.29385 7.95625 9.55246C7.95625 9.68792 8.00938 9.79567 8.11563 9.87572C8.22188 9.95576 8.34375 9.99578 8.48125 9.99578C8.63125 9.99578 8.75625 9.94653 8.85625 9.84801C8.95625 9.74949 9.01875 9.62635 9.04375 9.47857C9.08125 9.23228 9.16562 9.0137 9.29688 8.82282C9.42813 8.63195 9.63125 8.42568 9.90625 8.20402C10.2812 7.89615 10.5531 7.58829 10.7219 7.28042C10.8906 6.97256 10.975 6.62775 10.975 6.246C10.975 5.59333 10.7594 5.06996 10.3281 4.67589C9.89688 4.28183 9.325 4.0848 8.6125 4.0848C8.1375 4.0848 7.7 4.17716 7.3 4.36187C6.9 4.54659 6.56875 4.81751 6.30625 5.17463C6.20625 5.31009 6.16563 5.44863 6.18438 5.59025C6.20313 5.73187 6.2625 5.83962 6.3625 5.91351C6.5 6.01202 6.64688 6.04281 6.80313 6.00587C6.95937 5.96892 7.0875 5.88272 7.1875 5.74726C7.35 5.5256 7.54688 5.35627 7.77813 5.23929C8.00938 5.1223 8.26875 5.0638 8.55625 5.0638ZM8.5 15.7775C7.45 15.7775 6.46875 15.5897 5.55625 15.2141C4.64375 14.8385 3.85 14.3182 3.175 13.6532C2.5 12.9882 1.96875 12.2062 1.58125 11.3073C1.19375 10.4083 1 9.43547 1 8.38873C1 7.35431 1.19375 6.38762 1.58125 5.48866C1.96875 4.58969 2.5 3.80772 3.175 3.14273C3.85 2.47775 4.64375 1.95438 5.55625 1.57263C6.46875 1.19088 7.45 1 8.5 1C9.5375 1 10.5125 1.19088 11.425 1.57263C12.3375 1.95438 13.1313 2.47775 13.8063 3.14273C14.4813 3.80772 15.0156 4.58969 15.4094 5.48866C15.8031 6.38762 16 7.35431 16 8.38873C16 9.43547 15.8031 10.4083 15.4094 11.3073C15.0156 12.2062 14.4813 12.9882 13.8063 13.6532C13.1313 14.3182 12.3375 14.8385 11.425 15.2141C10.5125 15.5897 9.5375 15.7775 8.5 15.7775ZM8.5 14.6692C10.2625 14.6692 11.7656 14.0534 13.0094 12.822C14.2531 11.5905 14.875 10.1128 14.875 8.38873C14.875 6.6647 14.2531 5.18695 13.0094 3.95549C11.7656 2.72404 10.2625 2.10831 8.5 2.10831C6.7125 2.10831 5.20312 2.72404 3.97188 3.95549C2.74063 5.18695 2.125 6.6647 2.125 8.38873C2.125 10.1128 2.74063 11.5905 3.97188 12.822C5.20312 14.0534 6.7125 14.6692 8.5 14.6692Z"
                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                </svg>
                                Ask a
                                question
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
