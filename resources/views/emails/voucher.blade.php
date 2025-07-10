<h2>Chào {{ auth()->user()->ten ?? 'bạn' }},</h2>
<p>Bạn đã nhận được mã giảm giá vì đơn hàng > 1 triệu:</p>
<p><strong>Mã:</strong> {{ $voucher->ma_khuyen_mai }}</p>
<p><strong>Giảm:</strong> {{ $voucher->gia_tri }}%</p>
<p><strong>Hết hạn:</strong> {{ \Carbon\Carbon::parse($voucher->ngay_ket_thuc)->format('d/m/Y') }}</p>
