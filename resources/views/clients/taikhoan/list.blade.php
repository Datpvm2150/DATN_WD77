<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Mã đơn</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Trạng thái đơn hàng</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($donHangs as $ord)
            <tr>
                <td>{{ $ord->ma_hoa_don }}</td>
                <td>{{ number_format($ord->tong_tien, 0, ',', '.') }} đ</td>
                <td>{{ \Carbon\Carbon::parse($ord->ngay_dat_hang)->format('d-m-Y H:i:s') }}</td>
                <td>
                    @if ($ord->trang_thai == 1)
                        <span class="text-danger">Chờ xác nhận</span>
                    @elseif ($ord->trang_thai == 2)
                        <span class="text-warning">Đã xác nhận</span>
                    @elseif ($ord->trang_thai == 3)
                        <span class="text-info">Đang chuẩn bị</span>
                    @elseif ($ord->trang_thai == 4)
                        <span class="text-primary">Đang vận chuyển</span>
                    @elseif ($ord->trang_thai == 5)
                        <span class="badge bg-success">Đã giao hàng</span>
                    @elseif ($ord->trang_thai == 6)
                        <span class="badge bg-danger">Đã hủy</span>
                        @if ($ord->ly_do_huy)
                            <p><small>Lý do hủy: {{ $ord->ly_do_huy }}</small></p>
                        @endif
                    @elseif ($ord->trang_thai == 7)
                        <span class="badge bg-success">Đã nhận hàng</span>
                    @endif
                </td>
                <td>
                    <!-- Thao tác tương ứng với từng trạng thái -->
                    @if ($ord->trang_thai == 1)
                        <!-- Chờ xác nhận -->
                        <form action="{{ route('customer.cancelOrder', $ord->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <button type="submit" class="btn btn-sm btn-danger">Hủy</button>
                        </form>
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}"
                            class="btn btn-sm btn-primary">Xem</a>
                        @if (
                            $ord->phuong_thuc_thanh_toan == 'Thanh toán qua chuyển khoản ngân hàng' &&
                                $ord->trang_thai_thanh_toan == 'Chưa thanh toán' &&
                                $ord->trang_thai == 1)
                            @php
                                $thoiGianConLai = $ord->thoi_gian_het_han
                                    ? \Carbon\Carbon::parse($ord->thoi_gian_het_han)->diffForHumans(now(), [
                                        'parts' => 2,
                                    ])
                                    : null;
                            @endphp
                            @if (
                                $ord->trang_thai_thanh_toan === App\Models\HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán'] &&
                                    $ord->thoi_gian_het_han > now())
                                <form action="{{ route('customer.retryPayment', $ord->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Thanh toán lại</button>
                                </form>
                                @if ($thoiGianConLai)
                                    <small class="text-warning d-block">Thời gian còn lại: {{ $thoiGianConLai }}</small>
                                @endif
                            @else
                                <span class="text-danger">Đơn hàng đã hết hạn thanh toán.</span>
                                <form id="cancel-order-form-{{ $ord->id }}"
                                    action="{{ route('customer.cancelOrder', $ord->id) }}" method="POST"
                                    class="d-inline auto-cancel-form"
                                    data-expiration-time="{{ $ord->thoi_gian_het_han }}">
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                    <button type="submit" class="btn btn-sm btn-danger">Hủy</button>
                                </form>
                            @endif
                        @endif
                    @elseif (in_array($ord->trang_thai, [2, 3]))
                        <!-- Đã xác nhận, Đang chuẩn bị -->
                        <a href="#" class="btn btn-sm btn-danger cancel-order"
                            data-id="{{ $ord->id }}">Hủy</a>
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}"
                            class="btn btn-sm btn-primary">Xem</a>
                    @elseif ($ord->trang_thai == 4)
                        <!-- Đang vận chuyển -->
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}"
                            class="btn btn-sm btn-primary">Xem</a>
                    @elseif ($ord->trang_thai == 5)
                        <!-- Đã giao hàng -->
                        <form id="confirm-receive-form-{{ $ord->id }}"
                            action="{{ route('customer.getOrder', $ord->id) }}" method="POST"
                            class="d-inline auto-confirm-form" data-delivery-time="{{ $ord->updated_at }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Đã nhận hàng</button>
                        </form>
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}"
                            class="btn btn-sm btn-primary">Xem</a>
                    @elseif ($ord->trang_thai == 7)
                        <!-- Đã nhận hàng -->
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}"
                            class="btn btn-sm btn-primary">Xem</a>
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}" class="btn btn-sm btn-warning">Đánh
                            giá</a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Không có đơn hàng nào</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Modal để nhập lý do hủy -->
<div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelOrderModalLabel">Lý do hủy đơn hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="cancelOrderForm" action="" method="POST">
                @csrf
                {{-- @method('DELETE') --}}
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="ly_do_huy" class="form-label">Lý do hủy đơn hàng</label>
                        <textarea class="form-control" id="ly_do_huy" name="ly_do_huy" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý tự động hủy đơn hàng hết hạn
        const autoCancelForms = document.querySelectorAll('.auto-cancel-form');
        autoCancelForms.forEach(form => {
            const expirationTime = form.getAttribute('data-expiration-time');
            if (expirationTime) {
                const expirationDate = new Date(expirationTime).getTime();
                const currentTime = new Date().getTime();
                if (expirationDate < currentTime) {
                    form.submit();
                }
            }
        });

        // Xử lý tự động xác nhận nhận hàng
        const autoConfirmForms = document.querySelectorAll('.auto-confirm-form');
        autoConfirmForms.forEach(form => {
            const deliveryTime = form.getAttribute('data-delivery-time');
            if (deliveryTime) {
                const deliveryDate = new Date(deliveryTime).getTime();
                const currentTime = new Date().getTime();
                const timeDiff = deliveryDate + 7 * 24 * 60 * 60 * 1000 - currentTime; // 7 ngày
                if (timeDiff <= 0) {
                    form.submit();
                } else {
                    setTimeout(() => form.submit(), timeDiff);
                }
            }
        });

        // Xử lý khi nhấn nút hủy
        document.querySelectorAll('.cancel-order').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.getAttribute('data-id');
                const form = document.getElementById('cancelOrderForm');
                form.action = `/customer/${orderId}/cancel`;
                document.getElementById('ly_do_huy').value = '';
                $('#cancelOrderModal').modal('show');
            });
        });

        // Xử lý submit form hủy đơn hàng
        document.getElementById('cancelOrderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            const action = form.action;
            const lyDoHuy = document.getElementById('ly_do_huy').value;

            fetch(action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        ly_do_huy: lyDoHuy
                    })
                })

                .then(response => response.json())
                .then(data => {
                    $('#cancelOrderModal').modal('hide');
                    const toastElement = document.getElementById('toastMessage');
                    const toastBody = document.getElementById('toastBody');
                    toastBody.textContent = data.message || 'Đã hủy đơn hàng thành công!';
                    toastElement.classList.remove('text-bg-danger');
                    toastElement.classList.add('text-bg-success');
                    const toast = new bootstrap.Toast(toastElement);
                    toast.show();
                    // Tải lại danh sách đơn hàng
                    $.ajax({
                        url: '{{ route('customer.orders.filter') }}',
                        method: 'GET',
                        data: {
                            status: {{ session('currentStatus', 1) }}
                        },
                        success: function(response) {
                            $('#order-list').html(response.html);
                        }
                    });
                })
                .catch(error => {
                    const toastElement = document.getElementById('toastMessage');
                    const toastBody = document.getElementById('toastBody');
                    toastBody.textContent = error.responseJSON?.message ||
                        'Đã có lỗi khi hủy đơn hàng!';
                    toastElement.classList.remove('text-bg-success');
                    toastElement.classList.add('text-bg-danger');
                    const toast = new bootstrap.Toast(toastElement);
                    toast.show();
                });
        });
    });

    @if (isset($message))
        alert('Thông báo: ' + @json($message));
    @endif
</script>
