@extends('layouts.admin')
@section('title', 'Thêm banner')
@section('css')

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/main.css') }}">
@endsection
@section('content')

    <style>
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .preview-item {
            position: relative;
            border: 1px solid #ccc;
            padding: 10px;
            width: auto;
            max-width: 200px;
        }

        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            background-color: #fff;
            border: none;
            color: red;
            font-weight: bold;
            padding: 0;
        }

        .delete-button:hover {
            color: darkred;
        }
    </style>

    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Thêm mới banner</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thêm mới banner</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- Add a common Vị trí dropdown here -->
                                    <div class="mb-3">
                                        <label for="vi_tri" class="form-label">Vị trí:</label>
                                        <select class="form-select" id="vi_tri" name="vi_tri" required>
                                            <option value="" disabled selected>Chọn vị trí</option>
                                            <option value="header">Header</option>
                                            <option value="sidebar">Sidebar</option>
                                            <option value="footer">Footer</option>
                                        </select>
                                        @error('vi_tri')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Album ảnh:</label>
                                        <input class="form-control" type="file" id="hinh_anh" name="hinh_anh[]"
                                            multiple>
                                        @error('hinh_anh.*')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @error('hinh_anh')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="preview-container" id="preview"></div>
                                    </div>
                                    <button class="btn btn-success" type="submit" style="margin-top: 10px">Thêm
                                        banner</button>
                                </div>

                                <div class="col-lg-8">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Chi tiết banner</h5>
                                    </div>
                                    <div class="mb-3">
                                        <div id="banner-variants-container"></div>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Container for slider preview (only for header) -->
                <section class="tp-slider-area p-relative z-index-1" id="headerSliderContainer" style="display:none;">
                    <div class="tp-slider-active tp-slider-variation swiper-container">
                        <div class="swiper-wrapper" id="preview-banner-list">
                            <!-- Dynamic Banners will be injected here -->
                        </div>
                        <div class="tp-slider-arrow tp-swiper-arrow d-none d-lg-block">
                            <button type="button" class="tp-slider-button-prev">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                            <button type="button" class="tp-slider-button-next">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="tp-slider-dot tp-swiper-dot"></div>
                    </div>
                </section>
                <!-- banner area start -->
                <div id="sidebarImagesContainer" style="display: none;">

                </div>

                </section>
                <!-- banner area end -->
                <!-- product banner area start -->
                <div class="tp-product-banner-area pb-90"id="footerZoom" style="display: none;">
                    <div class="container">
                        <div class="tp-product-banner-slider fix">
                            <div class="tp-product-banner-slider-active swiper-container">
                                <div class="swiper-wrapper"id="footerZoomContainer">
                                   
                                </div>
                                <div class="tp-product-banner-slider-dot tp-swiper-dot"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product banner area end -->

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('hinh_anh');
            const previewContainer = document.getElementById('preview');
            const bannerVariantsContainer = document.getElementById('banner-variants-container');
            const previewBannerList = document.getElementById('preview-banner-list'); // Phần cho slider
            const headerSliderContainer = document.getElementById('headerSliderContainer');
            const footerZoom = document.getElementById('footerZoom');
            const sidebarImagesContainer = document.getElementById('sidebarImagesContainer');
            const footerZoomContainer = document.getElementById('footerZoomContainer');
            let selectedFiles = [];

            function renderPreview() {
                previewContainer.innerHTML = '';
                bannerVariantsContainer.innerHTML = '';
                previewBannerList.innerHTML = '';
                sidebarImagesContainer.innerHTML = '';
                footerZoomContainer.innerHTML = '';

                headerSliderContainer.style.display = 'none';
                sidebarImagesContainer.style.display = 'none';
                footerZoom.style.display = 'none';


                if (selectedFiles.length === 0) {
                    return;
                }

                selectedFiles.forEach((file, index) => {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';

                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.className = 'img-fluid';
                    img.style.maxHeight = '100px';
                    previewItem.appendChild(img);

                    const deleteButton = document.createElement('button');
                    deleteButton.className = 'btn btn-danger btn-sm delete-button';
                    deleteButton.textContent = 'X';
                    deleteButton.addEventListener('click', function() {
                        previewItem.remove();
                        selectedFiles.splice(index, 1);
                        renderPreview();
                    });
                    previewItem.appendChild(deleteButton);
                    previewContainer.appendChild(previewItem);
                });

                selectedFiles.forEach((file, index) => {
                    const variantItem = document.createElement('div');
                    variantItem.className = 'mb-3';
                    variantItem.innerHTML = `
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="ten_banner_${index}" class="form-label">Tên banner cho ảnh ${index + 1}:</label>
                                <input type="text" class="form-control" id="ten_banner_${index}" name="ten_banner[]"
                                    placeholder="Tên banner" required>
                            </div>
                            <div class="col-md-4">
                                <label for="url_lien_ket_${index}" class="form-label">Sản phẩm liên kết cho ảnh ${index + 1}:</label>
                                <select class="form-select" id="url_lien_ket_${index}"
                                    name="url_lien_ket[]" required>
                                    <option value="" disabled selected>Chọn sản phẩm</option>
                                    @foreach ($sanphams as $sanpham)
                                        <?php $url = route('admin.sanphams.show', $sanpham->id); ?>
                                        <option value="{{ $url }}">{{ $sanpham->ten_san_pham }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    `;
                    bannerVariantsContainer.appendChild(variantItem);
                });
            }
            input.addEventListener('change', function(event) {
                selectedFiles = Array.from(input.files);
                renderPreview();
            });
        });
    </script>

@endsection
