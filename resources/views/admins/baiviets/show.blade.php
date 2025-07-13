@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <!-- Bootstrap CSS (đã có trong layout, nhưng đảm bảo có sẵn) -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .article-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .article-content {
            line-height: 1.6;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Chi tiết bài viết</h4>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('admin.baiviets.index') }}" class="btn btn-primary">
                        <i class="ri-arrow-left-line"></i> Quay lại danh sách
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $baiViet->tieu_de }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Hình ảnh bài viết -->
                                @if ($baiViet->anh_bai_viet)
                                    <div class="col-md-6">
                                        <img src="{{ Storage::url($baiViet->anh_bai_viet) }}" alt="Ảnh bài viết"
                                            class="article-image">
                                    </div>
                                    <div class="col-md-6">
                                    @else
                                        <div class="col-md-12">
                                @endif
                                <!-- Thông tin bài viết -->
                                <p><strong>Người đăng:</strong> {{ $baiViet->user->ten }}</p>
                                <p><strong>Danh mục:</strong> {{ $baiViet->danhMuc->ten_danh_muc }}</p>
                                <p><strong>Ngày đăng:</strong> {{ $baiViet->created_at->format('d-m-Y H:i') }}</p>
                                <p><strong>Trạng thái:</strong>
                                    @if ($baiViet->trang_thai)
                                        <span class="badge bg-success">Đã duyệt</span>
                                    @else
                                        <span class="badge bg-danger">Chưa duyệt</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Nội dung bài viết -->
                        <div class="article-content mt-4">
                            <h5>Nội dung:</h5>
                            @if ($baiViet->noi_dung)
                                {!! $baiViet->noi_dung !!}
                            @else
                                <p class="text-muted">Không có nội dung</p>
                            @endif
                        </div>

                        <!-- Nút quay lại danh sách -->
                        <a href="{{ route('admin.baiviets.index') }}" class="btn btn-primary">
                            <i class="ri-arrow-left-line"></i> Quay lại danh sách
                        </a>

                        <!-- Nút hành động -->
                        <div class="mt-4 d-flex gap-2">
                            <a href="{{ route('admin.baiviets.edit', $baiViet->id) }}" class="btn btn-warning">
                                <i class="ri-edit-line"></i> Sửa
                            </a>
                            <form action="{{ route('admin.baiviets.onOffBaiViet', $baiViet->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('POST')
                                <button type="submit"
                                    class="btn {{ $baiViet->trang_thai ? 'btn-secondary' : 'btn-success' }}">
                                    {{ $baiViet->trang_thai ? 'Bỏ duyệt' : 'Duyệt' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.baiviets.destroy', $baiViet->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="ri-delete-bin-line"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection

@section('js')
    <!-- Bootstrap JS (đã có trong layout, nhưng đảm bảo có sẵn) -->
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
@endsection