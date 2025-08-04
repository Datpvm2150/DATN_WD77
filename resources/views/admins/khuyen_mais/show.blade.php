@extends('layouts.admin')
@section('title', 'Chi tiết khuyến mãi')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Chi tiết khuyến mãi</h2>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $khuyenMai->id }}</td>
            </tr>
            <tr>
                <th>Mã khuyến mãi</th>
                <td>{{ $khuyenMai->ma_khuyen_mai }}</td>
            </tr>
            <tr>
                <th>Loại mã</th>
                <td>
                    @switch($khuyenMai->loai_ma)
                        @case('cong_khai')
                            Công khai
                        @break

                        @case('ca_nhan')
                            Cá nhân
                        @break

                        @case('ma_doi_qua')
                            Mã đổi quà
                        @break

                        @default
                    @endswitch
                </td>
            </tr>
            <tr>
                <th>Phần trăm khuyến mãi</th>
                <td>{{ $khuyenMai->phan_tram_khuyen_mai }}%</td>
            </tr>
            <tr>
                <th>Giảm tối đa</th>
                <td>{{ number_format($khuyenMai->giam_toi_da) }} VNĐ</td>
            </tr>
            <tr>
                <th>Ngày bắt đầu</th>
                <td>{{ \Carbon\Carbon::parse($khuyenMai->ngay_bat_dau)->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Ngày kết thúc</th>
                <td>{{ \Carbon\Carbon::parse($khuyenMai->ngay_ket_thuc)->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td>{{ $khuyenMai->so_luong }}</td>
            </tr>
            <tr>
                <th>Đã sử dụng</th>
                <td>{{ $khuyenMai->da_su_dung }}</td>
            </tr>

            <tr>
                <th>Trạng thái</th>
                <td>
                    @if ($khuyenMai->trang_thai)
                        <span class="badge bg-success">Đang hoạt động</span>
                    @else
                        <span class="badge bg-secondary">Ngừng hoạt động</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Đã xóa mềm</th>
                <td>
                    @if ($khuyenMai->deleted_at)
                        <span class="badge bg-danger">Đã xóa</span>
                    @else
                        <span class="badge bg-success">Chưa xóa</span>
                    @endif
                </td>
            </tr>
        </table>

        <a href="{{ route('admin.khuyen_mais.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
@endsection
