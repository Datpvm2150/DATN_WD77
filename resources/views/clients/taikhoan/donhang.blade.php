@extends('layouts.client')

@section('content')
    <div class="container p-5">
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

        <!-- Toast để hiển thị thông báo -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="toastMessage" class="toast align-items-center text-bg-primary border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body" id="toastBody"></div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let currentStatus = {{ session('currentStatus', 1) }};

            // Load lần đầu
            loadOrders(currentStatus);

            // Gửi AJAX khi click trạng thái
            $('.filter-link').on('click', function () {
                currentStatus = $(this).data('status');
                $('.filter-link').removeClass('active');
                $(this).addClass('active');
                loadOrders(currentStatus);
            });

            // Tự ��ộng reload đơn hàng mỗi 5 giây
            setInterval(function () {
                loadOrders(currentStatus);
            }, 5000);

            function loadOrders(status) {
                $.ajax({
                    url: '{{ route('customer.orders.filter') }}',
                    method: 'GET',
                    data: { status: status },
                    success: function (response) {
                        console.log('Response:', response); // Debug log
                        $('#order-list').html(response.html);
                        
                        // Cập nhật số lượng cho từng tab
                        Object.keys(response.counts).forEach(function (key) {
                            const $link = $(`.filter-link[data-status="${key}"]`);
                            if ($link.length) {
                                const iconHTML = $link.find('i').prop('outerHTML');
                                let text = '';
                                
                                // Xác định text cho từng trạng thái
                                switch(key) {
                                    case '1': text = 'Chờ xác nhận'; break;
                                    case '2': text = 'Đã xác nhận'; break;
                                    case '3': text = 'Đang chuẩn bị'; break;
                                    case '4': text = 'Đang vận chuyển'; break;
                                    case '5': text = 'Đã giao hàng'; break;
                                    case '6': text = 'Đã hủy'; break;
                                    case '7': text = 'Đã nhận hàng'; break;
                                }
                                
                                $link.html(`${iconHTML} ${text} (${response.counts[key]})`);
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Lỗi khi lấy đơn hàng:', error);
                        console.error('Response:', xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection