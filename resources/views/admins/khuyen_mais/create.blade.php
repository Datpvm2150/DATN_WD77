@extends('layouts.admin')
@section('title', 'Thêm Khuyến Mãi')
@section('content')
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Khuyến mãi</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Khuyến mãi</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.khuyen_mais.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                    <div class="mb-3">
                                        <label for="ma_khuyen_mai" class="form-label">Mã khuyến mãi</label>
                                        <input class="form-control" type="text" id="ma_khuyen_mai" name="ma_khuyen_mai"
                                            placeholder="Mã khuyến mãi" value="{{ old('ma_khuyen_mai') }}">
                                        @error('ma_khuyen_mai')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="loai_ma" class="form-label">Loại mã</label>
                                        <select class="form-control" id="loai_ma" name="loai_ma">
                                            <option value="">-- Chọn loại mã --</option>
                                            <option value="cong_khai"
                                                {{ old('loai_ma', $KhuyenMai->loai_ma ?? '') == 'cong_khai' ? 'selected' : '' }}>
                                                Công khai</option>
                                            <option value="ma_doi_qua"
                                                {{ old('loai_ma', $KhuyenMai->loai_ma ?? '') == 'ma_doi_qua' ? 'selected' : '' }}>
                                                Mã đổi quà</option>
                                        </select>
                                        @error('loai_ma')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3" id="diem_can_group" style="display: none;">
                                        <label for="diem_can" class="form-label">Điểm cần</label>
                                        <input type="number" min="0" class="form-control" name="diem_can"
                                            id="diem_can" value="{{ old('diem_can', $KhuyenMai->diem_can ?? '') }}">
                                        @error('diem_can')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="phan_tram_khuyen_mai" class="form-label">Phần trăm khuyến mãi</label>
                                        <input class="form-control" type="number" id="phan_tram_khuyen_mai"
                                            name="phan_tram_khuyen_mai" placeholder="Phần trăm khuyến mãi"
                                            value="{{ old('phan_tram_khuyen_mai') }}" min="1" max="99">
                                        @error('phan_tram_khuyen_mai')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="giam_toi_da" class="form-label">Giảm tối đa</label>
                                        <input class="form-control" type="number" id="giam_toi_da" name="giam_toi_da"
                                            placeholder="Giảm tối đa" value="{{ old('giam_toi_da') }}" min="0">
                                        @error('giam_toi_da')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                                        <input class="form-control" type="datetime-local" id="ngay_bat_dau"
                                            name="ngay_bat_dau" placeholder="Ngày bắt đầu"
                                            value="{{ old('ngay_bat_dau') }}">
                                        @error('ngay_bat_dau')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                                        <input class="form-control" type="datetime-local" id="ngay_ket_thuc"
                                            name="ngay_ket_thuc" placeholder="Ngày kết thúc"
                                            value="{{ old('ngay_ket_thuc') }}">
                                        @error('ngay_ket_thuc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label">Số lượng</label>
                                        <input class="form-control" type="number" id="so_luong" name="so_luong"
                                            placeholder="Số lượng khuyến mãi" value="{{ old('so_luong') }}" min="1">
                                        @error('so_luong')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectLoaiMa = document.getElementById('loai_ma');
            const diemCanGroup = document.getElementById('diem_can_group');

            function toggleDiemCanField() {
                if (selectLoaiMa.value === 'ma_doi_qua') {
                    diemCanGroup.style.display = 'block';
                } else {
                    diemCanGroup.style.display = 'none';
                }
            }

            // Gọi ngay khi load để đảm bảo giữ lại giá trị khi chỉnh sửa
            toggleDiemCanField();

            // Gọi khi có thay đổi
            selectLoaiMa.addEventListener('change', toggleDiemCanField);
        });
    </script>
@endsection
