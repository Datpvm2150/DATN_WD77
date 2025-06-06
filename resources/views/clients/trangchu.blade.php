@extends('layouts.client')

@section('content')
    {{-- slide 1 --}}
    <section class="tp-slider-area p-relative z-index-1">
        <div class="tp-slider-active tp-slider-variation swiper-container">
            <div class="swiper-wrapper">
                @foreach ($bannersHeas as $bannersHea)
                    <div class="tp-slider-item tp-slider-height d-flex align-items-center swiper-slide green-dark-bg">
                        <div class="tp-slider-shape">
                            <img class="tp-slider-shape-1"
                                src="{{ asset('assets/client/img/slider/shape/slider-shape-1.png') }}" alt="slider-shape">
                            <img class="tp-slider-shape-2"
                                src="{{ asset('assets/client/img/slider/shape/slider-shape-2.png') }}" alt="slider-shape">
                            <img class="tp-slider-shape-3"
                                src="{{ asset('assets/client/img/slider/shape/slider-shape-3.png') }}" alt="slider-shape">
                            <img class="tp-slider-shape-4"
                                src="{{ asset('assets/client/img/slider/shape/slider-shape-4.png') }}" alt="slider-shape">
                        </div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <div class="tp-slider-content p-relative z-index-1">
                                        <span>SALE</span>
                                        <h3 class="tp-slider-title"
                                            style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $bannersHea->ten_banner }}</h3>
                                        <div class="tp-slider-btn">
                                            <a href="{{ $bannersHea->url_lien_ket }}"
                                                class="tp-btn tp-btn-2 tp-btn-white">Xem ngay
                                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-6">
                                    <div class="tp-slider-thumb text-end">
                                        <img src="{{ asset('storage/' . $bannersHea->anh_banner) }}" width="420px"
                                            height="350px" style="object-fit: contain; border-radius: 10%;" alt="slider-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tp-slider-arrow tp-swiper-arrow d-none d-lg-block">
                <button type="button" class="tp-slider-button-prev">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <button type="button" class="tp-slider-button-next">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="tp-slider-dot tp-swiper-dot"></div>
        </div>
    </section>
    {{-- hết slide 1 --}}

    {{-- danh mục  --}}
    <section class="tp-product-arrival-area pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-arrival-slider fix">
                        <div class="tp-product-arrival-active swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($danhMucs as $danhMuc)
                                    <div class="transition-3 swiper-slide">
                                        <!-- Hình ảnh sản phẩm -->
                                        <div class="tp-product-category-item text-center">
                                            <div class="tp-product-category-thumb"
                                                style="position: relative; width: 100%; overflow: hidden; border-radius: 50%;">
                                                {{-- <a href="{{ route('sanpham.danhmuc', ['danh_muc_id' => $danhMuc->id]) }}">
                                                    <img src="{{ asset($danhMuc->anh_danh_muc) }}"
                                                        alt="{{ $danhMuc->ten_danh_muc }}"
                                                        style="width: 100%; height: 100%; object-fit: contain; border-radius: 10px; transition: transform 0.3s; mix-blend-mode: darken; border-radius: 50%">
                                                </a> --}}
                                            </div>
                                            <div class="tp-product-category-content">
                                                {{-- <h3 class="tp-product-category-title">
                                                    <a href="{{ route('sanpham.danhmuc', ['danh_muc_id' => $danhMuc->id]) }}">
                                                        {{ $danhMuc->ten_danh_muc }}
                                                    </a>
                                                </h3>
                                                <p>{{ $danhMuc->san_phams_count }} Sản phẩm</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-product-arrival-more-wrapper d-flex justify-content-end">
                <div class="tp-product-arrival-arrow tp-swiper-arrow mb-40 text-end">
                    <button type="button" class="tp-arrival-slider-button-prev">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button type="button" class="tp-arrival-slider-button-next">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- hết danh mục  --}}




    {{-- sản phẩm nhiều lượt xem nhất --}}
    <section class="tp-product-area pb-55">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-5 col-lg-6 col-md-5">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Sản phẩm nổi bật

                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                    stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-tab-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel"
                                aria-labelledby="new-tab" tabindex="0">
                                <div class="row">
                                    @foreach ($products as $index => $product)
                                        <div class="col-xl-3 col-lg-3 col-sm-6">
                                            <div class="tp-product-item p-relative transition-3 mb-25">
                                                <div class="tp-product-thumb p-relative fix m-img">
                                                    <a href="{{ route('chitietsanpham', $product->id) }}">
                                                        <img width="254px" height="214px" style="object-fit: contain"
                                                            src="{{ asset($product->anh_san_pham) }}"
                                                            alt="product-electronic">
                                                    </a>

                                                    <!-- product badge -->
                                                    @if ($product->is_hot == true)
                                                        <div class="tp-product-badge">
                                                            <span class="product-hot">Hot</span>
                                                        </div> 
                                                    @endif

                                               
                                                </div>
                                                <!-- product content -->
                                                <div class="tp-product-content">
                                                    {{-- <div class="tp-product-category">
                                                        <a href="{{ isset($product->danhMuc->id) ? route('sanpham.danhmuc', $product->danhMuc->id) : '#' }}">
                                                            {{ isset($product->danhMuc->ten_danh_muc) ? $product->danhMuc->ten_danh_muc : '...' }}</a>
                                                    </div> --}}
                                                    <h3 class="tp-product-title"
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 199px;">
                                                        <a href="{{ route('chitietsanpham', $product->id) }}">
                                                            {{ $product->ten_san_pham }}
                                                        </a>
                                                    </h3>

                                                    <div class="tp-product-rating d-flex align-items-center">
                                                        <div class="tp-product-rating-icon">
                                                            @php
                                                                // Lấy điểm trung bình của sản phẩm (tính từ danh gia)
                                                                $averageRating = $product->danhGias->avg('diem_so');

                                                                // Nếu không có đánh giá, mặc định là 0 sao
                                                                $averageRating = $averageRating ?: 0;

                                                                // Tính số sao đầy, sao nửa, và sao trống
                                                                $fullStars = floor($averageRating);
                                                                $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                                            @endphp

                                                            <!-- Hiển thị sao đầy -->
                                                            @for ($i = 0; $i < $fullStars; $i++)
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                            @endfor

                                                            <!-- Hiển thị sao nửa -->
                                                            @for ($i = 0; $i < $halfStar; $i++)
                                                                <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                                            @endfor

                                                            <!-- Hiển thị sao trống -->
                                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                                <span><i class="fa-solid fa-star"
                                                                        style="color: #dcdcdc;"></i></span>
                                                            @endfor
                                                        </div>

                                                        <div class="tp-product-rating-text">
                                                            <span>({{ $product->danhGias->count() }} Reviews)</span>
                                                        </div>
                                                    </div>

                                                    <div class="tp-product-price-wrapper">
                                                        @if ($product->bienTheSanPhams->first()->gia_cu > $product->bienTheSanPhams->first()->gia_moi)
                                                            <span
                                                                class="tp-product-price new-price">{{ number_format($product->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                                        @else
                                                            <span
                                                                class="tp-product-price old-price">{{ number_format($product->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ</span>
                                                            <span
                                                                class="tp-product-price new-price">{{ number_format($product->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                                        @endif
                                                    </div>
                                                </div>
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
    </section>
    {{-- xem nhanh product nhiều lượt xem nhất --}}
    @foreach ($products as $index => $product)
        <div class="modal fade tp-product-modal" id="product{{ $index }}" tabindex="-1"
            aria-labelledby="product{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="tp-product-modal-content d-lg-flex align-items-start">
                        <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                            data-bs-target="#product{{ $index }}"><i class="fa-regular fa-xmark"></i></button>
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column" id="productDetailsNavThumb{{ $index }}"
                                    role="tablist">
                                    @foreach ($product->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                        <button class="nav-link {{ $imageIndex == 0 ? 'active' : '' }}"
                                            id="nav-{{ $imageIndex }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-{{ $imageIndex }}{{ $index }}" type="button"
                                            role="tab" aria-controls="nav-{{ $imageIndex }}{{ $index }}"
                                            aria-selected="{{ $imageIndex == 0 ? 'true' : 'false' }}">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt="">
                                        </button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content m-img" style="width: 450px;"
                                id="productDetailsNavContent{{ $index }}">
                                @foreach ($product->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                    <div class="tab-pane fade {{ $imageIndex == 0 ? 'show active' : '' }}"
                                        id="nav-{{ $imageIndex }}{{ $index }}" role="tabpanel"
                                        aria-labelledby="nav-{{ $imageIndex }}-tab" tabindex="0">
                                        <div class="tp-product-details-nav-main-thumb">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt=""
                                                style="object-fit: cover; width: 450px; height: 450px;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>
                                    {{ isset($product->danhMuc->ten_danh_muc) ? $product->danhMuc->ten_danh_muc : '...' }}
                                </span>
                                &
                                <span
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                    {{ $product->ma_san_pham ? $product->ma_san_pham : '...' }}
                                </span>
                            </div>
                            <div class="tp-product-category">
                                <a href="#">
                                    {{ isset($product->danhMuc->ten_danh_muc) ? $product->danhMuc->ten_danh_muc : '...' }}</a>
                            </div>
                            <h3 class="tp-product-details-title" style="max-width: 350px;">
                                {{ $product->ten_san_pham }}</h3>
                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                </div>
                            </div>
                            <p
                                style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; max-width: 350px;">
                                {{ $product->mo_ta }}</p>
                            <a style="color: #0989ff" href="{{ route('chitietsanpham', $product->id) }}">Xem thêm</a>
                            <!-- variations -->
                            <div class="tp-product-details-variation">
                                <div class="tp-product-details-variation-item">
                                    <h4 class="tp-product-details-variation-title">Lựa chọn
                                        :</h4>
                                    <div class="tp-product-details-variation-list">
                                        @foreach ($product->bienTheSanPhams as $bienThe)
                                            <button type="button"
                                                style="width: auto; margin-bottom: 4px; padding: 0 5px;"
                                                class="tp-size-variation-btn {{ $loop->first ? 'active' : '' }}"
                                                data-id="{{ $bienThe->id }}">
                                                <span>{{ $bienThe->dungLuong->ten_dung_luong }}
                                                    -
                                                    {{ $bienThe->mauSac->ten_mau_sac }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="tp-product-details-action-wrapper">
                                <a href="{{ route('chitietsanpham', $product->id) }}">
                                    <button class="tp-product-details-buy-now-btn w-100">Chi tiết sản
                                        phẩm</button>
                                </a>
                            </div>
                        </div>
                        {{-- kia --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- hết sản phẩm nhiều lượt xem nhất --}}

    {{-- khuyến mại --}}
    <section class="tp-product-offer grey-bg-2 pt-70 pb-80">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-4 col-md-5 col-sm-6">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Mã khuyến mãi
                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                    stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-8 col-md-7 col-sm-6">
                    <div class="tp-product-offer-more-wrapper d-flex justify-content-sm-end p-relative z-index-1">
                        <div class="tp-product-offer-more mb-40 text-sm-end grey-bg-2">
                            <span class="tp-product-offer-more-border"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-offer-slider fix">
                        <div class="tp-product-offer-slider-active swiper-container">
                            <div class="swiper-wrapper">
                                <!-- Hiển thị danh sách khuyến mãi -->
                                @foreach ($khuyenMais as $khuyenMai)
                                    <div class="tp-product-offer-item tp-product-item transition-3 swiper-slide">
                                        <div class="tp-product-content">
                                            <h4>Mã khuyến mãi :
                                                <div class="centered">
                                                    <div class="highlight">
                                                        <pre style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;"
                                                            class="highlight javascript"><code>{{ $khuyenMai->ma_khuyen_mai }}</code></pre>
                                                    </div>
                                                </div>
                                            </h4>
                                            <div class="tp-product-price-wrapper">
                                                <span class="tp-product-price new-price">Giảm giá:
                                                    {{ $khuyenMai->phan_tram_khuyen_mai }}% </span><br>
                                                <span class="tp-product-price text-danger">Giảm tối đa:
                                                    {{ number_format($khuyenMai->giam_toi_da, 0, ',', '.') }}₫ </span>
                                            </div>
                                            <div class="tp-product-countdown" data-countdown
                                                data-date="{{ $khuyenMai->ngay_ket_thuc }}">
                                                <div class="tp-product-countdown-inner">
                                                    <ul>
                                                        <li><span data-days></span> Ngày</li>
                                                        <li><span data-hours></span> Giờ</li>
                                                        <li><span data-minutes></span>Phút</li>
                                                        <li><span data-seconds></span> Giây</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tp-deals-slider-dot tp-swiper-dot text-center mt-40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            div.highlight button {
                box-sizing: border-box;
                transition: 0.2s ease-out;
                cursor: pointer;
                user-select: none;
                background: rgba(0, 0, 0, 0.15);
                border: 1px solid rgba(0, 0, 0, 0);
                padding: 5px 10px;
                font-size: 0.8em;
                position: absolute;
                top: 0;
                right: 0;
                border-radius: 0 0.15rem;
            }
        </style>
        <script>
            const copyToClipboard = (str) => {
                const el = document.createElement('textarea') // Create a <textarea> element
                el.value = str // Set its value to the string that you want copied
                el.setAttribute('readonly', '') // Make it readonly to be tamper-proof
                el.style.position = 'absolute'
                el.style.left = '-9999px' // Move outside the screen to make it invisible
                document.body.appendChild(el) // Append the <textarea> element to the HTML document
                const selected =
                    document.getSelection().rangeCount > 0 // Check if there is any content selected previously
                    ?
                    document.getSelection().getRangeAt(0) // Store selection if found
                    :
                    false // Mark as false to know no selection existed before
                el.select() // Select the <textarea> content
                document.execCommand('copy') // Copy - only works as a result of a user action (e.g. click events)
                document.body.removeChild(el) // Remove the <textarea> element
                if (selected) {
                    // If a selection existed before copying
                    document.getSelection().removeAllRanges() // Unselect everything on the HTML document
                    document.getSelection().addRange(selected) // Restore the original selection
                }
            }

            function handleCopyClick(evt) {
                // get the children of the parent element
                const {
                    children
                } = evt.target.parentElement
                // grab the first element (we append the copy button on afterwards, so the first will be the code element)
                // destructure the innerText from the code block
                const {
                    innerText
                } = Array.from(children)[0]

                // copy all of the code to the clipboard
                copyToClipboard(innerText)
                // alert to show it worked, but you can put any kind of tooltip/popup
                alertify.success(`Copy mã khuyến mãi: ${innerText}`);
            }

            // get the list of all highlight code blocks
            const highlights = document.querySelectorAll('div.highlight')
            // add the copy button to each code block
            highlights.forEach((div) => {
                // create the copy button
                const copy = document.createElement('button')
                copy.innerHTML = 'Copy'
                // add the event listener to each click
                copy.addEventListener('click', handleCopyClick)
                // append the copy button to each code block
                div.append(copy)
            })
        </script>
    </section>
    {{-- hết khuyến mại --}}

    {{-- slide 2  --}}
    <section class="tp-banner-area pb-70">
        <div class="container">
            <div class="row">
                @foreach ($bannersSides as $bannersSide)
                    <div class="col-xl-6 col-lg-6">
                        <div class="tp-banner-item tp-banner-height p-relative mb-30 z-index-1 fix">
                            <div class="tp-banner-thumb include-bg transition-3"
                                data-background="{{ asset('storage/' . $bannersSide->anh_banner) }}"></div>
                            <div class="tp-banner-content">
                                <span>Sale</span>
                                <h3 class="tp-banner-title"
                                    style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <a href="{{ $bannersSide->url_lien_ket }}">{{ $bannersSide->ten_banner }}</a>
                                </h3>
                                <div class="tp-banner-btn">
                                    <a href="{{ $bannersSide->url_lien_ket }}" class="tp-link-btn">Xem ngay
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- hết slide 2  --}}

    {{-- sản phẩm mới  --}}
    <section class="tp-product-gadget-area pt-80 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="tp-product-gadget-sidebar mb-40">
                        <div class="tp-product-gadget-categories p-relative fix mb-10">
                            <div class="tp-product-gadget-thumb">
                                <img src="{{ asset('assets/client/img/product/gadget/gadget-girl.png') }}"
                                    alt="">
                            </div>
                            <h3 class="tp-product-gadget-categories-title">Sản phẩm <br> Tiện ích</h3>
                            {{-- @foreach ($danhMucs as $danhMuc)
                                <div class="tp-product-gadget-categories-list">
                                    <ul>
                                        <li><a
                                                href="{{ route('sanpham.danhmuc', ['danh_muc_id' => $danhMuc->id]) }}">{{ $danhMuc->ten_danh_muc }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach --}}
                            <div class="tp-product-gadget-btn">
                                {{-- <a href="{{ route('san-pham') }}" class="tp-link-btn">Sản phẩm khác
                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a> --}}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="tp-product-gadget-wrapper">
                        <div class="row">
                            @foreach ($newProducts as $index => $newProduct)
                                <div class="col-xl-4 col-sm-6">
                                    <div class="tp-product-item p-relative transition-3 mb-25">
                                        <div class="tp-product-thumb p-relative fix m-img">
                                            <a href="{{ route('chitietsanpham', $newProduct->id) }}">
                                                <img width="254px" height="214px" style="object-fit: contain"
                                                    src="{{ asset($newProduct->anh_san_pham) }}"
                                                    alt="product-electronic">
                                            </a>
                                        </div>
                                        <!-- product content -->
                                        <div class="tp-product-content">
                                            {{-- <div class="tp-product-category">
                                                <a
                                                    href="{{ route('sanpham.danhmuc', ['danh_muc_id' => $newProduct->danhMuc->id]) }}">{{ isset($newProduct->danhMuc->ten_danh_muc) ? $newProduct->danhMuc->ten_danh_muc : '...' }}</a>
                                            </div> --}}
                                            <h3 class="tp-product-title"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 199px;">
                                                <a href="{{ route('chitietsanpham', $newProduct->id) }}">
                                                    {{ $newProduct->ten_san_pham }}
                                                </a>
                                            </h3>
                                    
                                            <div class="tp-product-rating d-flex align-items-center">
                                                <div class="tp-product-rating-icon">
                                                    @php
                                                        // Lấy điểm trung bình của sản phẩm (tính từ danh gia)
                                                        $averageRating = $newProduct->danhGias->avg('diem_so');

                                                        // Nếu không có đánh giá, mặc định là 0 sao
                                                        $averageRating = $averageRating ?: 0;

                                                        // Tính số sao đầy, sao nửa, và sao trống
                                                        $fullStars = floor($averageRating);
                                                        $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                                        $emptyStars = 5 - ($fullStars + $halfStar);
                                                    @endphp

                                                    <!-- Hiển thị sao đầy -->
                                                    @for ($i = 0; $i < $fullStars; $i++)
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    @endfor

                                                    <!-- Hiển thị sao nửa -->
                                                    @for ($i = 0; $i < $halfStar; $i++)
                                                        <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                                    @endfor

                                                    <!-- Hiển thị sao trống -->
                                                    @for ($i = 0; $i < $emptyStars; $i++)
                                                        <span><i class="fa-solid fa-star"
                                                                style="color: #dcdcdc;"></i></span>
                                                    @endfor
                                                </div>

                                                <div class="tp-product-rating-text">
                                                    <span>({{ $newProduct->danhGias->count() }} Reviews)</span>
                                                </div>
                                            </div>
                                            <div class="tp-product-price-wrapper">
                                                <span
                                                    class="tp-product-price old-price">{{ number_format($newProduct->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ</span>
                                                <span
                                                    class="tp-product-price new-price">{{ number_format($newProduct->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- xem nhanh newproduct --}}
    @foreach ($newProducts as $index => $newProduct)
        <div class="modal fade tp-product-modal" id="newProduct{{ $index }}" tabindex="-1"
            aria-labelledby="newProduct{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="tp-product-modal-content d-lg-flex align-items-start">
                        <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                            data-bs-target="#newProduct{{ $index }}"><i class="fa-regular fa-xmark"></i></button>
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column"
                                    id="productDetailsNavThumb{{ $index }}{{ $index }}" role="tablist">
                                    @foreach ($newProduct->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                        <button class="nav-link {{ $imageIndex == 0 ? 'active' : '' }}"
                                            id="nav-{{ $imageIndex }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-{{ $imageIndex }}{{ $index }}{{ $index }}"
                                            type="button" role="tab"
                                            aria-controls="nav-{{ $imageIndex }}{{ $index }}{{ $index }}"
                                            aria-selected="{{ $imageIndex == 0 ? 'true' : 'false' }}">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt="">
                                        </button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content m-img" style="width: 450px;"
                                id="productDetailsNavContent{{ $index }}{{ $index }}">
                                @foreach ($newProduct->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                    <div class="tab-pane fade {{ $imageIndex == 0 ? 'show active' : '' }}"
                                        id="nav-{{ $imageIndex }}{{ $index }}{{ $index }}"
                                        role="tabpanel" aria-labelledby="nav-{{ $imageIndex }}-tab" tabindex="0">
                                        <div class="tp-product-details-nav-main-thumb">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt=""
                                                style="object-fit: cover; width: 450px; height: 450px;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <h1></h1> --}}
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>
                                    {{ isset($newProduct->danhMuc->ten_danh_muc) ? $newProduct->danhMuc->ten_danh_muc : '...' }}
                                </span>
                                &
                                <span
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                    {{ $newProduct->ma_san_pham ? $newProduct->ma_san_pham : '...' }}
                                </span>
                            </div>
                            <div class="tp-product-category">
                                <a href="#">
                                    {{ isset($newProduct->danhMuc->ten_danh_muc) ? $newProduct->danhMuc->ten_danh_muc : '...' }}</a>
                            </div>
                            <h3 class="tp-product-details-title" style="max-width: 350px;">
                                {{ $newProduct->ten_san_pham }}</h3>
                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                    <div class="tp-product-details-rating">
                                    </div>
                                    <div class="tp-product-details-reviews">
                                    </div>
                                </div>
                            </div>
                            <p
                                style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; max-width: 350px;">
                                {{ $newProduct->mo_ta }}</p>
                            <a style="color: #0989ff" href="{{ route('chitietsanpham', $newProduct->id) }}">Xem thêm</a>
                            <!-- variations -->
                            <div class="tp-product-details-variation">
                                <div class="tp-product-details-variation-item">
                                    <h4 class="tp-product-details-variation-title">Lựa chọn
                                        :</h4>
                                    <div class="tp-product-details-variation-list">
                                        @foreach ($newProduct->bienTheSanPhams as $bienThe)
                                            <button type="button"
                                                style="width: auto; margin-bottom: 4px; padding: 0 5px;"
                                                class="tp-size-variation-btn {{ $loop->first ? 'active' : '' }}"
                                                data-id="{{ $bienThe->id }}">
                                                <span>{{ $bienThe->dungLuong->ten_dung_luong }}
                                                    -
                                                    {{ $bienThe->mauSac->ten_mau_sac }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tp-product-details-action-wrapper">
                                <a href="{{ route('chitietsanpham', $newProduct->id) }}">
                                    <button class="tp-product-details-buy-now-btn w-100">Chi tiết sản
                                        phẩm</button>
                                </a>
                            </div>
                            <!-- actions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- hết sản phẩm mới  --}}


    {{-- slide 3 --}}
    <div class="tp-product-banner-area pb-90">
        <div class="container">
            <div class="tp-product-banner-slider fix">
                <div class="tp-product-banner-slider-active swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($bannersFoots as $bannersFoot)
                            <div class="tp-product-banner-inner theme-bg p-relative z-index-1 fix swiper-slide">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tp-product-banner-content p-relative z-index-1">
                                            <span class="tp-product-banner-subtitle">Sale</span>
                                            <h3 class="tp-product-banner-title"
                                                style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $bannersFoot->ten_banner }}</h3>

                                            <div class="tp-product-banner-btn">
                                                <a href="{{ $bannersFoot->url_lien_ket }}" class="tp-btn tp-btn-2">Xem
                                                    ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tp-product-banner-thumb-wrapper p-relative">
                                            <div class="tp-product-banner-thumb-shape">
                                                <span class="tp-product-banner-thumb-gradient"></span>
                                            </div>
                                            <div class="tp-product-banner-thumb text-end p-relative z-index-1">
                                                <img src="{{ asset('storage/' . $bannersFoot->anh_banner) }}"
                                                    width="420px" height="350px"
                                                    style="object-fit: contain; border-radius: 10%" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tp-product-banner-slider-dot tp-swiper-dot"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- hết slide 3 --}}

    {{-- anhnt --}}
    <section class="tp-product-area pb-55">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-5 col-lg-6 col-md-5">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Gợi ý sản phẩm

                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                    stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-tab-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel"
                                aria-labelledby="new-tab" tabindex="0">
                                <div class="row">
                                    @foreach ($randProducts as $index => $randProduct)
                                        <div class="col-xl-3 col-lg-3 col-sm-6">
                                            <div class="tp-product-item p-relative transition-3 mb-25">
                                                <div class="tp-product-thumb p-relative fix m-img">
                                                    <a href="{{ route('chitietsanpham', $randProduct->id) }}">
                                                        <img width="254px" height="214px" style="object-fit: contain"
                                                            src="{{ asset($randProduct->anh_san_pham) }}"
                                                            alt="product-electronic">
                                                    </a>

                                                    <!-- product badge -->
                                                    <div class="tp-product-badge">
                                                        <span class="product-hot">Hot</span>
                                                    </div>

                                             
                                                </div>
                                                <!-- product content -->
                                                <div class="tp-product-content">
                                                    {{-- <div class="tp-product-category">
                                                        <a href="{{ route('sanpham.danhmuc', ['danh_muc_id' => $randProduct->danhMuc->id]) }}">
                                                            {{ isset($randProduct->danhMuc->ten_danh_muc) ? $randProduct->danhMuc->ten_danh_muc : '...' }}</a>
                                                    </div> --}}
                                                    <h3 class="tp-product-title"
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 199px;">
                                                        <a href="{{ route('chitietsanpham', $randProduct->id) }}">
                                                            {{ $randProduct->ten_san_pham }}
                                                        </a>
                                                    </h3>

                                                    <div class="tp-product-rating d-flex align-items-center">
                                                        <div class="tp-product-rating-icon">
                                                            @php
                                                                // Lấy điểm trung bình của sản phẩm (tính từ danh gia)
                                                                $averageRating = $randProduct->danhGias->avg('diem_so');

                                                                // Nếu không có đánh giá, mặc định là 0 sao
                                                                $averageRating = $averageRating ?: 0;

                                                                // Tính số sao đầy, sao nửa, và sao trống
                                                                $fullStars = floor($averageRating);
                                                                $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                                            @endphp

                                                            <!-- Hiển thị sao đầy -->
                                                            @for ($i = 0; $i < $fullStars; $i++)
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                            @endfor

                                                            <!-- Hiển thị sao nửa -->
                                                            @for ($i = 0; $i < $halfStar; $i++)
                                                                <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                                            @endfor

                                                            <!-- Hiển thị sao trống -->
                                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                                <span><i class="fa-solid fa-star"
                                                                        style="color: #dcdcdc;"></i></span>
                                                            @endfor
                                                        </div>

                                                        <div class="tp-product-rating-text">
                                                            <span>({{ $randProduct->danhGias->count() }} Reviews)</span>
                                                        </div>
                                                    </div>
                                                    <div class="tp-product-price-wrapper">
                                                        <span
                                                            class="tp-product-price old-price">{{ number_format($randProduct->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ</span>
                                                        <span
                                                            class="tp-product-price new-price">{{ number_format($randProduct->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                                    </div>
                                                </div>
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
    </section>
    {{-- xem nhanh product random --}}
    @foreach ($randProducts as $index => $randProduct)
        <div class="modal fade tp-product-modal" id="randProduct{{ $index }}" tabindex="-1"
            aria-labelledby="randProduct{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="tp-product-modal-content d-lg-flex align-items-start">
                        <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                            data-bs-target="#randProduct{{ $index }}"><i
                                class="fa-regular fa-xmark"></i></button>
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column"
                                    id="productDetailsNavThumb{{ $index }}{{ $index }}{{ $index }}"
                                    role="tablist">
                                    @foreach ($randProduct->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                        <button class="nav-link {{ $imageIndex == 0 ? 'active' : '' }}"
                                            id="nav-{{ $imageIndex }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-{{ $imageIndex }}{{ $index }}{{ $index }}{{ $index }}"
                                            type="button" role="tab"
                                            aria-controls="nav-{{ $imageIndex }}{{ $index }}{{ $index }}{{ $index }}"
                                            aria-selected="{{ $imageIndex == 0 ? 'true' : 'false' }}">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt="">
                                        </button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content m-img" style="width: 450px;"
                                id="productDetailsNavContent{{ $index }}{{ $index }}{{ $index }}">
                                @foreach ($randProduct->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                    <div class="tab-pane fade {{ $imageIndex == 0 ? 'show active' : '' }}"
                                        id="nav-{{ $imageIndex }}{{ $index }}{{ $index }}{{ $index }}"
                                        role="tabpanel" aria-labelledby="nav-{{ $imageIndex }}-tab" tabindex="0">
                                        <div class="tp-product-details-nav-main-thumb">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}"
                                                style="object-fit: cover; width: 450px; height: 450px;" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <h1></h1> --}}
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>
                                    {{ isset($randProduct->danhMuc->ten_danh_muc) ? $randProduct->danhMuc->ten_danh_muc : '...' }}
                                </span>
                                &
                                <span
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                    {{ $randProduct->ma_san_pham ? $randProduct->ma_san_pham : '...' }}
                                </span>
                            </div>
                            <div class="tp-product-category">
                                <a href="#">
                                    {{ isset($randProduct->danhMuc->ten_danh_muc) ? $randProduct->danhMuc->ten_danh_muc : '...' }}</a>
                            </div>
                            <h3 class="tp-product-details-title" style="max-width: 350px;">
                                {{ $randProduct->ten_san_pham }}</h3>
                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                </div>
                            </div>
                            <p
                                style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; max-width: 350px;">
                                {{ $newProduct->mo_ta }}</p>
                            <a style="color: #0989ff" href="{{ route('chitietsanpham', $newProduct->id) }}">Xem thêm</a>
                            <!-- variations -->
                            <div class="tp-product-details-variation">
                                <div class="tp-product-details-variation-item">
                                    <h4 class="tp-product-details-variation-title">Lựa chọn
                                        :</h4>
                                    <div class="tp-product-details-variation-list">
                                        @foreach ($randProduct->bienTheSanPhams as $bienThe)
                                            <button type="button"
                                                style="width: auto; margin-bottom: 4px; padding: 0 5px;"
                                                class="tp-size-variation-btn {{ $loop->first ? 'active' : '' }}"
                                                data-id="{{ $bienThe->id }}">
                                                <span>{{ $bienThe->dungLuong->ten_dung_luong }}
                                                    -
                                                    {{ $bienThe->mauSac->ten_mau_sac }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- actions -->
                            <div class="tp-product-details-action-wrapper">
                                <a href="{{ route('chitietsanpham', $randProduct->id) }}">
                                    <button class="tp-product-details-buy-now-btn w-100">Chi tiết sản
                                        phẩm</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- anhnt --}}

    <!-- blog area start -->
    <section class="tp-blog-area pt-50 pb-75">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-4 col-md-6">
                    <div class="tp-section-title-wrapper mb-50">
                        <h3 class="tp-section-title">Tin tức & bài viết
                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                    stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6">
                    <div class="tp-blog-more-wrapper d-flex justify-content-md-end">
                        <div class="tp-blog-more mb-50 text-md-end">
                            {{-- <a href="{{ route('bai-viet') }}" class="tp-btn tp-btn-2 tp-btn-blue">Xem tất cả tin tức
                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a> --}}
                            <span class="tp-blog-more-border"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-blog-main-slider">
                        <div class="tp-blog-main-slider-active swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($baiViets as $baiViet)
                                    <div class="tp-blog-item mb-30 swiper-slide">
                                        <div class="tp-blog-thumb p-relative fix">
                                            <a href="{{ route('chitietbaiviet', ['id' => $baiViet->id]) }}">
                                                <img src="{{ asset('storage/' . $baiViet->anh_bai_viet) }}"
                                                    alt="{{ $baiViet->tieu_de }}">
                                            </a>
                                            <div class="tp-blog-meta tp-blog-meta-date">
                                                <span>{{ \Carbon\Carbon::parse($baiViet->created_at)->translatedFormat(' d  n, Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="tp-blog-content">
                                            <h3 class="tp-blog-title">
                                                <a
                                                    href="{{ route('chitietbaiviet', ['id' => $baiViet->id]) }}">{{ $baiViet->tieu_de }}</a>
                                            </h3>
                                            <div class="tp-blog-tag">
                                                <span><i class="fa-light fa-tag"></i></span>
                                                {{-- @if ($baiViet->danhMuc)
                                                    <a href="{{ route('bai-viet', ['danh_muc' => $danhMuc->id]) }}">
                                                        {{ $baiViet->danhMuc->ten_danh_muc }}</a>
                                                @endif --}}
                                            </div>
                                            <p>{{ Str::limit(strip_tags($baiViet->noi_dung), 60) }}</p>
                                            <div class="tp-blog-btn">
                                                <a href="{{ route('chitietbaiviet', ['id' => $baiViet->id]) }}"
                                                    class="tp-btn-2 tp-btn-border-2">
                                                    Xem thêm
                                                    <span>
                                                        <svg width="17" height="15" viewBox="0 0 17 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 7.5L1 7.5" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end -->
@endsection
