@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <style>
        .equal-td {
            width: 50%;
            text-align: center;
            vertical-align: middle;
        }

        .equal-td .form-select {
            width: 75%;
            margin: 0 auto;
        }

        .equal-td .badge {
            display: inline-block;
            margin: 0 auto;
        }

        .table th,
        .table td {
            white-space: nowrap;
        }

        .table td,
        .table th {
            padding: 8px;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý danh sách đơn hàng</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-content-center mb-0">{{ $title }}</h5>
                        </div>

                        <form action="{{ route('admin.hoadons.index') }}" method="GET"
                            style="max-width: 1000px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; display: flex; align-items: center; gap: 10px; flex-wrap: nowrap;">
                            <div style="flex: 1; min-width: 170px;">
                                <label for="ngay_bat_dau" style="display: block; font-weight: bold; margin-bottom: 5px;">Ngày bắt đầu:</label>
                                <input type="date" name="ngay_bat_dau" id="ngay_bat_dau"
                                    value="{{ request('ngay_bat_dau') }}"
                                    style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>

                            <div style="flex: 1; min-width: 170px;">
                                <label for="ngay_ket_thuc" style="display: block; font-weight: bold; margin-bottom: 5px;">Ngày kết thúc:</label>
                                <input type="date" name="ngay_ket_thuc" id="ngay_ket_thuc"
                                    value="{{ request('ngay_ket_thuc') }}"
                                    style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>

                            <div style="flex: 1; min-width: 180px;">
                                <label for="phuong_thuc_thanh_toan" style="display: block; font-weight: bold; margin-bottom: 5px;">Phương thức thanh toán:</label>
                                <select name="phuong_thuc_thanh_toan" id="phuong_thuc_thanh_toan"
                                    style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Tất cả</option>
                                    <option value="Thanh toán qua chuyển khoản ngân hàng"
                                        {{ request('phuong_thuc_thanh_toan') == 'Thanh toán qua chuyển khoản ngân hàng' ? 'selected' : '' }}>
                                        Thanh toán qua chuyển khoản ngân hàng</option>
                                    <option value="Thanh toán khi nhận hàng"
                                        {{ request('phuong_thuc_thanh_toan') == 'Thanh toán khi nhận hàng' ? 'selected' : '' }}>
                                        Thanh toán khi nhận hàng</option>
                                </select>
                            </div>

                            <div style="flex: 1; min-width: 170px;">
                                <label for="trang_thai" style="display: block; font-weight: bold; margin-bottom: 5px;">Trạng thái đơn hàng:</label>
                                <select name="trang_thai" id="trang_thai"
                                    style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Tất cả</option>
                                    @foreach ($trangThaiHoaDon as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ request('trang_thai') == $key ? 'selected' : '' }}>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div style="flex: 1; min-width: 170px;">
                                <label for="trang_thai_thanh_toan" style="display: block; font-weight: bold; margin-bottom: 5px;">Trạng thái thanh toán:</label>
                                <select name="trang_thai_thanh_toan" id="trang_thai_thanh_toan"
                                    style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Tất cả</option>
                                    <option value="Đã thanh toán"
                                        {{ request('trang_thai_thanh_toan') == 'Đã thanh toán' ? 'selected' : '' }}>Đã thanh toán</option>
                                    <option value="Thanh toán thất bại"
                                        {{ request('trang_thai_thanh_toan') == 'Thanh toán thất bại' ? 'selected' : '' }}>
                                        Thanh toán thất bại</option>
                                    <option value="Chưa thanh toán"
                                        {{ request('trang_thai_thanh_toan') == 'Chưa thanh toán' ? 'selected' : '' }}>Chưa thanh toán</option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <button type="submit"
                                    style="padding: 10px; border: none; border-radius: 4px; background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer;">Lọc</button>
                            </div>
                        </form>

                        <form action="{{ route('admin.hoadons.index') }}" method="GET" class="search-form"
                            style="display: flex; justify-content: flex-end; align-items: center; gap: 10px;">
                            <div class="form-group"
                                style="position: relative; width: 100%; max-width: 250px; padding-right: 20px">
                                <input type="text" name="ma_don_hang" id="ma_don_hang" class="form-input"
                                    value="{{ request('ma_don_hang') }}" placeholder="Tìm kiếm..."
                                    style="padding: 6px 35px 6px 8px; width: 100%; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);">
                                <button type="submit"
                                    style="position: absolute; right: 25px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #555;">
                                    <i class="fas fa-search" style="font-size: 16px;"></i>
                                </button>
                            </div>
                        </form>

                        <div class="card-body">
                            <div class="table-responsive">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <table class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Trạng thái thanh toán</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listHoaDon as $item)
                                            <tr>
                                                <td>{{ $item->ma_hoa_don }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->ngay_dat_hang)->format('d-m-Y') }}</td>
                                                <td style="color: red; font-weight: bold;">
                                                    {{ number_format($item->tong_tien, 0, '', '.') }}
                                                </td>
                                                <td style="color: {{ $item->phuong_thuc_thanh_toan == 'Thanh toán qua chuyển khoản ngân hàng' ? 'blue' : ($item->phuong_thuc_thanh_toan == 'Thanh toán khi nhận hàng' ? 'red' : 'black') }}">
                                                    {{ $item->phuong_thuc_thanh_toan }}
                                                </td>
                                                <td class="equal-td">
                                                    <form action="{{ route('admin.hoadons.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="trang_thai" class="form-select w-100" onchange="this.form.submit()" required
                                                            @if ($item->trang_thai == 6 || $item->trang_thai == 7) disabled @endif>
                                                            @foreach ($trangThaiHoaDon as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $item->trang_thai ? 'selected' : '' }}
                                                                    @if (
                                                                        $key != $item->trang_thai &&
                                                                            (($item->trang_thai < 5 && $key != $item->trang_thai + 1) ||
                                                                                ($item->trang_thai == 5 && !in_array($key, [6, 7])) ||
                                                                                $item->trang_thai >= 6)) disabled @endif>
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </td>
                                                <td class="equal-td">
                                                    <form action="{{ route('admin.hoadons.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="trang_thai_thanh_toan"
                                                            class="form-select badge w-75 text-white p-2 bg-{{ $item->trang_thai_thanh_toan === 'Chưa thanh toán' ? 'danger' : ($item->trang_thai_thanh_toan === 'Đã thanh toán' ? 'success' : 'secondary') }} text-white"
                                                            onchange="updateSelectBackground(this); this.form.submit()"
                                                            id="trang_thai_thanh_toan_{{ $item->id }}"
                                                            @if ($item->phuong_thuc_thanh_toan === 'Thanh toán qua chuyển khoản ngân hàng' || $item->trang_thai == 6 || $item->trang_thai == 7) disabled @endif>
                                                            <option value="Chưa thanh toán"
                                                                {{ $item->trang_thai_thanh_toan === 'Chưa thanh toán' ? 'selected' : '' }}
                                                                @if ($item->phuong_thuc_thanh_toan === 'Thanh toán qua chuyển khoản ngân hàng') disabled @endif>
                                                                Chưa thanh toán
                                                            </option>
                                                            <option value="Đã thanh toán"
                                                                {{ $item->trang_thai_thanh_toan === 'Đã thanh toán' ? 'selected' : '' }}>
                                                                Đã thanh toán
                                                            </option>
                                                            <option value="Thanh toán thất bại"
                                                                {{ $item->trang_thai_thanh_toan === 'Thanh toán thất bại' ? 'selected' : '' }}
                                                                @if ($item->phuong_thuc_thanh_toan === 'Thanh toán qua chuyển khoản ngân hàng') disabled @endif>
                                                                Thanh toán thất bại
                                                            </option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thao tác<i
                                                                    class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('admin.hoadons.show', $item->id) }}">Xem chi tiết</a>
                                                                @if ($item->trang_thai != 4 && $item->trang_thai != 5 && $item->trang_thai != 6 && $item->trang_thai == 7)
                                                                    <a class="dropdown-item cancel-order" href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#cancelOrderModal" data-id="{{ $item->id }}">Hủy đơn hàng</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    {{ $listHoaDon->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Cancel Reason -->
            <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cancelOrderModalLabel">Lý do hủy đơn hàng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="cancelOrderForm" action="" method="POST">
                            @csrf
                            @method('DELETE')
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
        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('.form-select');
            selects.forEach(function(selectElement) {
                selectElement.addEventListener('change', function() {
                    confirmSubmit(selectElement);
                });
            });

            // Xử lý khi nhấn vào nút "Hủy đơn hàng"
            const cancelButtons = document.querySelectorAll('.cancel-order');
            cancelButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-id');
                    const form = document.getElementById('cancelOrderForm');
                    form.action = `/admin/hoadons/${orderId}/destroy`;
                });
            });
        });

        function confirmSubmit(selectElement) {
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            if (confirm('Bạn có chắc chắn thay đổi trạng thái thành "' + selectedOption + '" không?')) {
                form.submit();
            } else {
                selectElement.value = defaultValue;
            }
        }

        function updateSelectBackground(selectElement) {
            const selectedValue = selectElement.value;
            const selectClassList = selectElement.classList;

            selectClassList.remove('bg-danger', 'bg-success', 'bg-secondary');

            if (selectedValue === 'Chưa thanh toán') {
                selectClassList.add('bg-danger');
            } else if (selectedValue === 'Đã thanh toán') {
                selectClassList.add('bg-success');
            } else if (selectedValue === 'Thanh toán thất bại') {
                selectClassList.add('bg-secondary');
            }
        }
    </script>
@endsection