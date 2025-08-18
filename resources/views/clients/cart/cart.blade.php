@extends('layouts.client')

@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Giỏ hàng</h3>
                        <div class="breadcrumb__list">
                            <span><a href="#">Trang chủ</a></span>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- cart area start -->
    <section class="tp-cart-area pb-120">
        <div class="container">
            <form id="checkout-form" action="{{ route('thanhtoan') }}" method="POST">
                @csrf
                <div class="row" id="list-cart">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-cart-list mb-25 mr-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select-all-cart" /></th>

                                        <th colspan="2" class="tp-cart-header-product">Sản phẩm</th>
                                        <th class="tp-cart-header-price">Loại sản phẩm</th>
                                        <th class="tp-cart-header-price">Giá</th>
                                        <th class="tp-cart-header-quantity">Số lượng</th>
                                        <th></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @if (Session::has('cart') != null)
                                        @foreach (Session::get('cart')->products as $idbt => $product)
                                            <tr data-id="{{ $idbt }}">
                                                <td>
                                                    <input type="checkbox" class="select-cart-item" name="cart_items[]"
                                                        value="{{ $idbt }}">
                                                </td>
                                                <td>
                                                    <!-- img -->
                                                <td class="tp-cart-img">
                                                    <a href="{{ route('chitietsanpham', $product['productInfo']->id) }}">
                                                        <img src="{{ asset($product['productInfo']->anh_san_pham) }}"
                                                            alt="{{ $product['productInfo']->ten_san_pham ?? 'Product Image' }}">
                                                    </a>
                                                </td>
                                                <!-- title -->
                                                <td class="tp-cart-title"
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
                                                    <a
                                                        href="{{ route('chitietsanpham', $product['productInfo']->id) }}">{{ isset($product['productInfo']->ten_san_pham) ? $product['productInfo']->ten_san_pham : 'Tên sản phẩm không có' }}</a>
                                                </td>
                                                <!-- type -->
                                                <td class="tp-cart-price">
                                                    <span class="text-primary">
                                                        {{ isset($product['bienthe']->dungLuong) ? $product['bienthe']->dungLuong->ten_dung_luong : '...' }}
                                                    </span>
                                                    <span class="cartmini__quantity">
                                                        x
                                                        {{ isset($product['bienthe']->mauSac) ? $product['bienthe']->mauSac->ten_mau_sac : '...' }}
                                                    </span>
                                                </td>
                                                <!-- price -->
                                                <td class="tp-cart-price">


                                                    <span class="item-price"
                                                        data-price="{{ isset($product['bienthe']->gia_moi) && $product['bienthe']->gia_moi > 0 ? $product['bienthe']->gia_moi : (isset($product['bienthe']->gia_cu) ? $product['bienthe']->gia_cu : 0) }}">
                                                        @if (isset($product['bienthe']->gia_moi) && $product['bienthe']->gia_moi > 0)
                                                            {{ number_format($product['bienthe']->gia_moi, 0, ',', '.') }}
                                                            VNĐ
                                                        @elseif (isset($product['bienthe']->gia_cu) && $product['bienthe']->gia_cu > 0)
                                                            {{ number_format($product['bienthe']->gia_cu, 0, ',', '.') }}
                                                            VNĐ
                                                        @else
                                                            Chưa có giá
                                                        @endif
                                                    </span>
                                                </td>
                                                <!-- quantity -->
                                                <td class="tp-cart-quantity">
                                                    <div class="tp-product-quantity mt-10 mb-10">
                                                        <span class="tp-cart-minus cart-minus">
                                                            <svg width="10" height="2" viewBox="0 0 10 2"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 1H9" stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                        {{-- <input class="tp-cart-input" type="text"
                                                        value="{{ isset($product['quantity']) ? $product['quantity'] : 0 }}"> --}}
                                                        <input class="tp-cart-input cart-quantity" type="text"
                                                            value="{{ isset($product['quantity']) ? $product['quantity'] : 0 }}"
                                                            data-max-quantity="{{ $product['bienthe']->so_luong }}">
                                                        <span class="tp-cart-plus cart-plus">
                                                            <svg width="10" height="10" viewBox="0 0 10 10"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 1V9" stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 5H9" stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </td>
                                                <!-- action -->
                                                <td class="tp-cart-action">
                                                    <button type="button" class="tp-cart-action-btn"
                                                        onclick="DeleteItemCart({{ $idbt }})">
                                                        <svg width="10" height="10" viewBox="0 0 10 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>

                            </table>
                        </div>
                        <div class="tp-cart-bottom">
                            <div class="row align-items-end">
                                <div class="col-xl-6 col-md-8">
                                    <div class="tp-cart-coupon">
                                        {{-- <div class="tp-cart-coupon-input-box">
                                            <label class="form-label fw-bold mb-2">Mã giảm giá</label>

                                            @php
                                                use Illuminate\Support\Carbon;

                                                $maGiamGiaCongKhai = \App\Models\KhuyenMai::whereNull('user_id')
                                                    ->where('trang_thai', 1)
                                                    ->where('loai_ma', '!=', 'ma_doi_qua')
                                                    ->get();

                                                $maGiamGiaCaNhan = auth()->check()
                                                    ? \App\Models\KhuyenMai::where('user_id', auth()->id())
                                                        ->where('trang_thai', 1)
                                                        ->get()
                                                    : collect();
                                            @endphp

                                            <div class="row gx-2 gy-2 mb-2">
                                                <!-- Dropdown chọn mã -->
                                                <div class="col-md-10">
                                                    <select id="select-discount-code" class="form-select">
                                                        <option value="">-- Chọn mã giảm giá --</option>
                                                        @foreach ($maGiamGiaCongKhai as $item)
                                                            @php

                                                                $hsdFormatted = \Carbon\Carbon::parse(
                                                                    $item->ngay_ket_thuc,
                                                                )->format('H:i d/m/Y');
                                                            @endphp

                                                            <option value="{{ $item->ma_khuyen_mai }}">
                                                                {{ $item->ma_khuyen_mai }} - Giảm
                                                                {{ $item->phan_tram_khuyen_mai }}%
                                                                (tối đa {{ number_format($item->giam_toi_da) }}₫)
                                                                - HSD: {{ $hsdFormatted }}

                                                            </option>
                                                        @endforeach
                                                        @if (auth()->check())
                                                            @foreach ($maGiamGiaCaNhan as $item)
                                                                @php

                                                                    $hsdFormatted = \Carbon\Carbon::parse(
                                                                        $item->ngay_ket_thuc,
                                                                    )->format('H:i d/m/Y');
                                                                @endphp
                                                                <option value="{{ $item->ma_khuyen_mai }}">

                                                                    {{ $item->ma_khuyen_mai }}(Tặng) - Giảm
                                                                    {{ $item->phan_tram_khuyen_mai }}%
                                                                    (tối đa {{ number_format($item->giam_toi_da) }}₫)
                                                                    - HSD: {{ $hsdFormatted }}

                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <!-- Nút chọn mã -->
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-outline-primary w-100"
                                                        onclick="chooseDiscountCode()">Chọn</button>
                                                </div>
                                            </div>

                                            <!-- Nhập mã thủ công -->
                                            <div class="row gx-2 gy-2 align-items-center">
                                                <div class="col-md-10">
                                                    <input type="text" id="discount-code" class="form-control"
                                                        placeholder="Nhập mã thủ công">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-dark apply-discount-btn"
                                                        onclick="discount()">Áp
                                                        dụng</button>
                                                </div>
                                            </div>

                                        </div> --}}

                                        <div class="tp-cart-coupon-input-box">
                                            <label class="form-label fw-bold mb-2">Mã giảm giá</label>

                                            @php
                                                use Illuminate\Support\Carbon;

                                                $maGiamGiaCongKhai = \App\Models\KhuyenMai::whereNull('user_id')
                                                    ->where('trang_thai', 1)
                                                    ->where('loai_ma', '!=', 'ma_doi_qua')
                                                    ->get();

                                                $maGiamGiaCaNhan = auth()->check()
                                                    ? \App\Models\KhuyenMai::where('user_id', auth()->id())
                                                        ->where('trang_thai', 1)
                                                        ->get()
                                                    : collect();
                                            @endphp

                                            <div class="row gx-2 gy-2 mb-2">
                                                <!-- Dropdown chọn mã -->
                                                <div class="col-md-10">
                                                    <select id="select-discount-code" class="form-select discount-select">
                                                        <option value="">🎫 Chọn mã giảm giá có sẵn</option>
                                                        @foreach ($maGiamGiaCongKhai as $item)
                                                            @php
                                                                $hsdFormatted = \Carbon\Carbon::parse(
                                                                    $item->ngay_ket_thuc,
                                                                )->format('d/m/Y');
                                                            @endphp

                                                            <option value="{{ $item->ma_khuyen_mai }}"
                                                                class="discount-option">
                                                                🏷️ {{ $item->ma_khuyen_mai }} • Giảm
                                                                {{ $item->phan_tram_khuyen_mai }}% (tối đa
                                                                {{ number_format($item->giam_toi_da, 0, ',', '.') }}₫) •
                                                                HSD: {{ $hsdFormatted }}
                                                            </option>
                                                        @endforeach
                                                        @if (auth()->check())
                                                            @foreach ($maGiamGiaCaNhan as $item)
                                                                @php

                                                                    $hsdFormatted = \Carbon\Carbon::parse(
                                                                        $item->ngay_ket_thuc,
                                                                    )->format('d/m/Y');
                                                                @endphp
                                                                <option value="{{ $item->ma_khuyen_mai }}"
                                                                    class="discount-option personal">
                                                                    ⭐ {{ $item->ma_khuyen_mai }} (Cá nhân) • Giảm
                                                                    {{ $item->phan_tram_khuyen_mai }}% (tối đa
                                                                    {{ number_format($item->giam_toi_da, 0, ',', '.') }}₫)
                                                                    • HSD: {{ $hsdFormatted }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <!-- Nút chọn mã -->
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-outline-primary w-100 select-btn"
                                                        onclick="chooseDiscountCode()">Chọn</button>
                                                </div>
                                            </div>

                                            <!-- Nhập mã thủ công -->
                                            <div class="row gx-2 gy-2 align-items-center">
                                                <div class="col-md-10">
                                                    <input type="text" id="discount-code" class="form-control"
                                                        placeholder="Nhập mã thủ công">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-dark apply-discount-btn"
                                                        onclick="discount()">Áp
                                                        dụng</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-4">
                                    <div class="tp-cart-update text-md-end">
                                        {{-- <button type="button" class="tp-cart-update-btn">Update Cart</button> --}}
                                        <a href="{{ route('trangchu') }}" type="button" class="tp-cart-update-btn">Đi
                                            đến
                                            mua
                                            sắm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <div class="tp-cart-checkout-wrapper">
                            <script>
                                window.discountPercent = 0;
                                window.maxDiscount = 0;
                                @if (Session::has('discount_percentage'))
                                    window.discountPercent = {{ Session::get('discount_percentage') }};
                                @endif
                                @if (Session::has('maxDiscount'))
                                    window.maxDiscount = {{ Session::get('maxDiscount') }};
                                @endif
                            </script>
                            <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                                <span class="tp-cart-checkout-top-title">Tổng phụ</span>
                                <span class="tp-cart-checkout-top-price" id="subtotal-price" style="font-size: 16px">
                                    {{ isset(Session::get('cart')->totalPrice) ? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : '0' }}
                                    VNĐ
                                </span>
                            </div>
                            <div class="tp-cart-checkout-shipping">
                                {{-- <h4 class="tp-cart-checkout-shipping-title">Shipping</h4> --}}

                                <div class="tp-cart-checkout-shipping-option-wrapper">
                                    <div class="tp-cart-checkout-shipping-option text-black">
                                        Mã giảm giá:
                                        @if (Session::get('discount_code'))
                                            <span id="discount-code-show" class="text-dark">
                                                {{ Session::get('discount_code') }}
                                            </span>
                                            <td class="tp-cart-action">
                                                <button type="button" class="tp-cart-action-btn"
                                                    onclick="DeleteDiscount()">
                                                    <svg width="10" height="10" viewBox="0 0 10 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </button>
                                            </td>
                                        @endif
                                    </div>

                                    <div class="tp-cart-checkout-shipping-option text-black">
                                        Giảm giá:
                                        @php
                                            $discountAmount = 0;
                                            if (Session::has('discount_code') && Session::has('cart')) {
                                                $discountCode = Session::get('discount_code');
                                                $discount = Session::get('discount_percentage');
                                                $maxDiscount = Session::get('maxDiscount');
                                                $cart = Session::get('cart');

                                                if ($cart && isset($cart->totalPrice)) {
                                                    $discountAmount = $cart->totalPrice * ($discount / 100);

                                                    if ($maxDiscount > 0 && $maxDiscount <= $discountAmount) {
                                                        $discountAmount = $maxDiscount;
                                                    } elseif ($maxDiscount <= 0) {
                                                        $discountAmount = 0;
                                                    }
                                                }
                                            }
                                        @endphp

                                        <span id="discount-amount-show" class="text-danger">
                                            {{ number_format($discountAmount, 0, ',', '.') }} VNĐ
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                                <span>Còn lại</span>
                                @if (isset($discount))
                                    <span id="total-price-show">
                                        @php
                                            $total = Session::get('cart')->totalPrice - $discountAmount;
                                            $total = $total > 0 ? number_format($total, 0, ',', '.') : 0;
                                        @endphp
                                        {{ isset($total) ? $total : 0 }}
                                        VNĐ
                                    </span>
                                @else
                                    <span id="total-price-show">
                                        {{ isset(Session::get('cart')->totalPrice) ? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : 0 }}
                                        VNĐ
                                    </span>
                                @endif

                            </div>
                            <div class="tp-cart-checkout-proceed">
                                <button type="submit" class="tp-cart-checkout-btn w-100">Tiến hành thanh toán</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="" id="total-quantity-list-cart"
                        value="{{ isset(Session::get('cart')->totalProduct) ? Session::get('cart')->totalProduct : 0 }}">
                </div>
            </form>
        </div>
    </section>
    <script>
        function chooseDiscountCode() {
            const selectedCode = document.getElementById("select-discount-code").value;
            if (selectedCode) {
                document.getElementById("discount-code").value = selectedCode;
            }
        }

        function discount() {
            const code = document.getElementById("discount-code").value;

            if (!code) {
                showDiscountToast("Vui lòng nhập mã khuyến mãi.");
                return;
            }

            $.ajax({
                url: "/Discount-Cart/" + code,
                type: "GET",
                success: function(data) {
                    $("#list-cart").html(data);
                },
                error: function(xhr) {
                    const json = xhr.responseJSON;
                    if (json && json.message) {
                        showDiscountToast(json.message);
                    } else {
                        showDiscountToast("Đã xảy ra lỗi. Vui lòng thử lại sau.");
                    }
                }
            });
        }
    </script>

    <style>
        .apply-discount-btn {
            width: 100%;
            height: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            white-space: nowrap;
        }

        .discount-select {
            border: 3px solid #e3e6ea;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 14px;
            font-weight: 500;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .discount-select:hover {
            border-color: #007bff;
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(0, 123, 255, 0.15);
        }

        .discount-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.15), 0 4px 20px rgba(0, 123, 255, 0.2);
            transform: translateY(-1px);
            outline: none;
        }

        .discount-select option {
            padding: 12px;
            font-size: 14px;
            line-height: 1.6;
            border-radius: 8px;
            margin: 2px 0;
        }

        .discount-select option:first-child {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
            font-weight: 600;
        }

        .discount-select option.discount-option {
            background: linear-gradient(135deg, #e3f2fd 0%, #f8f9fa 100%);
            color: #1565c0;
            font-weight: 500;
            border-left: 4px solid #2196f3;
        }

        .discount-select option.discount-option.personal {
            background: linear-gradient(135deg, #e8f5e8 0%, #f1f8e9 100%);
            color: #2e7d32;
            font-weight: 600;
            border-left: 4px solid #4caf50;
        }

        /* Căn chỉnh nút chọn với dropdown */
        .select-btn {
            height: 58px !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

@endsection
@push('scripts')
    <script>
        @if (session('success'))
            alertify.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            alertify.error("{{ session('error') }}");
        @endif
    </script>
@endpush
