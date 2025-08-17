@extends('layouts.client')

@section('content')
<div class="container p-5">
    <h3 class="profile__info-title">Đánh giá sản phẩm</h3>
    
    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>Đơn hàng: {{ $hoaDon->ma_hoa_don }}</h5>
            <small class="text-muted">Ngày đặt: {{ \Carbon\Carbon::parse($hoaDon->ngay_dat_hang)->format('d-m-Y H:i:s') }}</small>
        </div>
        <div class="card-body">
            <h6>Sản phẩm trong đơn hàng:</h6>
            @foreach($hoaDon->chiTietHoaDons as $chiTiet)
                <div class="product-review-item border rounded p-3 mb-3">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>{{ $chiTiet->ten_san_pham }}</h6>
                            <p class="text-muted mb-1">
                                @if($chiTiet->ten_dung_luong)
                                    Dung lượng: {{ $chiTiet->ten_dung_luong }}
                                @endif
                                @if($chiTiet->ten_mau_sac)
                                    | Màu sắc: {{ $chiTiet->ten_mau_sac }}
                                @endif
                            </p>
                            <p class="text-muted">Số lượng: {{ $chiTiet->so_luong }}</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="button" class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#reviewModal" 
                                    data-san-pham-id="{{ $chiTiet->bienTheSanPham->sanPham->id }}">
                                Đánh giá
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('customer.donhang') }}" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>
    </div>
</div>

@include('clients.taikhoan.review_modal')
@endsection

@section('js')
<script>
$(document).ready(function() {
    // Xử lý khi modal đánh giá được mở
    $('#reviewModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var sanPhamId = button.data('san-pham-id');
        var modal = $(this);
        
        // Đặt san_pham_id vào form
        modal.find('#sanPhamId').val(sanPhamId);
    });
});
</script>
@endsection