@extends('layouts.client')

@section('content')

    <div class="container p-5 ">
            <h3 class="profile__info-title">Lịch sử đơn hàng</h3>
            @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
            @endif
            <!-- Thanh trạng thái -->
            <nav class="nav nav-pills nav-fill mb-4">
                <a class="nav-link filter-link active" data-status="1" href="javascript:void(0)">
                    <i class="fas fa-hourglass-start"></i> Chờ xác nhận ({{ $counts[1] ?? 0 }})
                </a>
                <a class="nav-link filter-link" data-status="2" href="javascript:void(0)">
                    <i class="fas fa-box"></i> Đã xác nhận ({{ $counts[2] ?? 0 }})
                </a>
                
                <a class="nav-link filter-link" data-status="3" href="javascript:void(0)">
                    <i class="fas fa-clipboard-list"></i> Đang chuẩn bị ({{ $counts[3] ?? 0 }})
                </a>

                <a class="nav-link filter-link" data-status="4" href="javascript:void(0)">
                    <i class="fas fa-truck"></i> Đang vận chuyển ({{ $counts[4] ?? 0 }})
                </a>
                <a class="nav-link filter-link" data-status="5" href="javascript:void(0)">
                    <i class="fas fa-box-open"></i> Đã giao hàng ({{ $counts[5] ?? 0 }})
                </a>

                <a class="nav-link filter-link" data-status="7" href="javascript:void(0)">
                    <i class="fas fa-check-circle"></i> Đã nhận hàng ({{ $counts[7] ?? 0 }})
                </a>
                <a class="nav-link filter-link" data-status="6" href="javascript:void(0)">
                    <i class="fas fa-times-circle"></i> Đã hủy ({{ $counts[6] ?? 0 }})
                </a>
                
                
            </nav>
        
            <!-- Khu vực hiển thị đơn hàng -->
            <div id="order-list">
                @include('clients.taikhoan.list', ['donHangs' => $donHangs])
            </div>
        </div>
          <!-- khu vực breadcrumb bắt đầu -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toastMessage" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastBody">
                    <!-- Nội dung thông báo sẽ được cập nhật động -->
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endsection
@if(session('js'))
    {!! session('js') !!}
@endif
@section('js')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
    <script>
        
        $(document).ready(function () {
    let currentStatus = 1;

    // Load lần đầu
    loadOrders(currentStatus);

    // Gửi AJAX khi click trạng thái
    $('.filter-link').on('click', function () {
        currentStatus = $(this).data('status');
        $('.filter-link').removeClass('active');
        $(this).addClass('active');
        loadOrders(currentStatus);
    });

    // Tự động reload đơn hàng mỗi 10 giây (10000 ms)
    setInterval(function () {
        loadOrders(currentStatus);
    }, 1000); // Có thể chỉnh 5s, 15s tùy bạn

    function loadOrders(status) {
        $.ajax({
            url: '/customer/orders/filter',
            method: 'GET',
            data: { status: status },
            success: function (response) {
                $('#order-list').html(response.html);

                Object.keys(response.counts).forEach(function (key) {
                    const $link = $(`.filter-link[data-status="${key}"]`);
                    if ($link.length) {
                        const text = $link.text().split(' (')[0].trim();
                        const iconHTML = $link.find('i').prop('outerHTML');
                        $link.html(`${iconHTML} ${text} (${response.counts[key]})`);
                    }
                });
            },
            error: function () {
                console.error('Lỗi khi lấy đơn hàng.');
            }
        });
    }

    // Toast như cũ
    const message = sessionStorage.getItem('orderMessage');
    if (message) {
        const toastElement = document.getElementById('toastMessage');
        const toastBody = document.getElementById('toastBody');

        if (toastElement && toastBody) {
            toastBody.textContent = message;
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
        } else {
            const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
            document.getElementById('toastBody').textContent = 'Đặt hàng thành công! Bạn sẽ được chuyển hướng đến đơn hàng.';
            toast.show();
        }

        sessionStorage.removeItem('orderMessage');
    }
});



    </script>
    
@endsection
