@extends('layouts.admin')
@section('title', 'Chỉnh sửa Khuyến Mãi')
@section('content')
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Chỉnh sửa Khuyến mãi</h4>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Chỉnh sửa Khuyến mãi</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.khuyen_mais.update', $KhuyenMai->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="mb-3">
                                        <label for="ma_khuyen_mai" class="form-label">Mã khuyến mãi</label>
                                        <input class="form-control" type="text" id="ma_khuyen_mai" name="ma_khuyen_mai"
                                            placeholder="Mã khuyến mãi" value="{{ $KhuyenMai->ma_khuyen_mai }}">
                                        @error('ma_khuyen_mai')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="phan_tram_khuyen_mai" class="form-label">Phần trăm khuyến mãi</label>
                                        <input class="form-control" type="number" id="phan_tram_khuyen_mai"
                                            name="phan_tram_khuyen_mai" placeholder="Phần trăm khuyến mãi"
                                            value="{{ $KhuyenMai->phan_tram_khuyen_mai }}" min="1" max="99">
                                        @error('phan_tram_khuyen_mai')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="giam_toi_da" class="form-label">Giảm tối đa</label>
                                        <input class="form-control" type="number" id="giam_toi_da" name="giam_toi_da"
                                            placeholder="Giảm tối đa" value="{{ $KhuyenMai->giam_toi_da }}" min="0"
                                            step="0.01">
                                        @error('giam_toi_da')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                                        <input type="datetime-local" id="ngay_bat_dau" name="ngay_bat_dau"
                                            value="{{ \Carbon\Carbon::parse($KhuyenMai->ngay_bat_dau)->format('Y-m-d\TH:i') }}"
                                            class="form-control">
                                        @error('ngay_bat_dau')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                                        <input type="datetime-local" id="ngay_ket_thuc" name="ngay_ket_thuc"
                                            value="{{ \Carbon\Carbon::parse($KhuyenMai->ngay_ket_thuc)->format('Y-m-d\TH:i') }}"
                                            class="form-control">
                                        @error('ngay_ket_thuc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label">Số lượng</label>
                                        <input class="form-control" type="number" id="so_luong" name="so_luong"
                                            placeholder="Số lượng khuyến mãi" value="{{ $KhuyenMai->so_luong }}"
                                            min="1">
                                        @error('so_luong')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                    <a href="{{ route('admin.khuyen_mais.index') }}" class="btn btn-dark">Quay lại</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
