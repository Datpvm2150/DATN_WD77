@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('css')
    <!-- Include custom CSS if needed -->
    <link href="{{ asset('assets/admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Danh sách sản phẩm</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">
                                <h5 class="card-title mb-0">Danh sách sản phẩm đã xóa</h5>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif

                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Hot</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sanphams as $sanpham)
                                    <tr class="">
                                        <td style="max-width: 250px;">
                                            <ul style="list-style-type: none; margin: 0px; padding: 0px">
                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    ID: {{ $sanpham->id }}</li>
                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    Mã: {{ $sanpham->ma_san_pham }}</li>
                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    Tên: {{ $sanpham->ten_san_pham }}</li>
                                            </ul>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            @if ($sanpham->anh_san_pham)
                                                <div
                                                    style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                    <img src="{{ asset($sanpham->anh_san_pham) }}" alt="Hình ảnh"
                                                        width="80" height="80"
                                                        style="object-fit: cover; border-radius: 6px;">
                                                </div>
                                            @else
                                                <span class="text-muted">Không có ảnh</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul style="list-style-type: none; margin: 0px; padding: 0px">

                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    {{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}</li>
                                            </ul>
                                        </td>
                                        <td style="max-width: 200px; overflow: hidden; white-space: normal;">
                                            <ul style="list-style-type: none; margin: 0px; padding: 0px">
                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    {{ $sanpham->created_at ? $sanpham->created_at->format('d-m-Y') : '' }}
                                                </li>
                                            </ul>

                                        </td>
                                        <td>
                                            <div class="col-md-2">
                                                <div class="form-check form-switch mb-2">
                                                    <form action="{{ route('admin.sanphams.isHot', $sanpham->id) }}"
                                                        method="POST" id="form-toggle-hot_{{ $sanpham->id }}">
                                                        @csrf
                                                        @method('POST')
                                                        <div class="form-group">
                                                            <input type="checkbox" name="is_hot" value="1"
                                                                class="form-check-input" id="is_hot_{{ $sanpham->id }}"
                                                                @if ($sanpham->is_hot) checked @endif
                                                                @if ($sanpham->deleted_at != null) disabled @endif
                                                                role="switch" onchange="this.form.submit()">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($sanpham->deleted_at == null)
                                                <span class="badge badge-success bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="card-body">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Thao tác<i
                                                            class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu">
                                                            <form
                                                                action="{{ route('admin.sanphams.restore', $sanpham->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <button class="dropdown-item" href="">Khôi
                                                                    phục</button>

                                                            </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- DataTables JS -->
    <script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>

    <!-- DataTable Demo App JS -->
    <script src="{{ asset('assets/admin/js/pages/datatable.init.js') }}"></script>
@endsection