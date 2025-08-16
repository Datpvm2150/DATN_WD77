@extends('layouts.client')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4"><i class="fa fa-gift text-primary me-2"></i>Đổi quà</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (Auth::check())
            <div class="alert alert-info">
                Điểm tích lũy của bạn: <strong>{{ Auth::user()->diem_tich_luy }}</strong>
            </div>
        @else
            <div class="alert alert-warning">
                Bạn cần <a href="{{ route('customer.login') }}">đăng nhập</a> để đổi quà.
            </div>
        @endif

        <div class="row">
            @forelse($maDoiQuas as $voucher)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <i class="fa fa-ticket-alt me-1"></i>Đổi quà ngay bây giờ
                            </h5>

                            <ul class="list-unstyled small mb-3">
                                <li><strong>Giảm:</strong> {{ $voucher->phan_tram_khuyen_mai }}%</li>
                                <li><strong>Giảm tối đa:</strong> {{ number_format($voucher->giam_toi_da) }} VND</li>
                                <li><strong>Điểm cần:</strong> {{ $voucher->diem_can }}</li>
                                <li>
                                    <strong>Số lượng còn lại:</strong>
                                    {{ is_null($voucher->so_luong) ? 'Không giới hạn' : ($voucher->so_luong <= 0 ? 'Đã hết' : $voucher->so_luong) }}
                                </li>
                                <li>
                                    <strong>Hạn dùng:</strong>
                                    {{ $voucher->ngay_ket_thuc ? \Carbon\Carbon::parse($voucher->ngay_ket_thuc)->format('d/m/Y') : 'Không giới hạn' }}
                                </li>
                            </ul>

                            @if (Auth::check())
                                @php
                                    $daHetMa = !is_null($voucher->so_luong) && $voucher->so_luong <= 0;
                                    $khongDuDiem = Auth::user()->diem_tich_luy < $voucher->diem_can;
                                    $daDoi = \App\Models\DoiQua::where('user_id', Auth::id())
                                        ->where('khuyen_mai_id', $voucher->id)
                                        ->where('trang_thai', 'thanh_cong')
                                        ->exists();
                                @endphp

                                @if ($daDoi)
                                    <button class="btn btn-info w-100" disabled>Đã đổi</button>
                                @elseif($daHetMa)
                                    <button class="btn btn-secondary w-100" disabled>Hết lượt đổi</button>
                                @elseif($khongDuDiem)
                                    <button class="btn btn-warning w-100" disabled>Không đủ điểm</button>
                                @else
                                    <form action="{{ route('doiqua.redeem', $voucher->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fa fa-exchange-alt me-1"></i>Đổi quà
                                        </button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('customer.login') }}" class="btn btn-primary w-100">Đăng nhập để đổi</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Hiện chưa có mã đổi quà nào khả dụng.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
