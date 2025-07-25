@extends('layouts.admin')

@section('title', 'Danh sách màu sắc')


@section('css')
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
    <div class="container">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Danh sách màu sắc</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">
                                <h5 class="card-title mb-0">Danh sách Màu Sắc</h5>
                            </div>
                            <div>
                                <a href="{{ route('admin.mausacs.create') }}" class="btn btn-success">Thêm mới</a>
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
                                    <th>ID</th>
                                    <th>Tên màu</th>
                                    <th>Mã màu</th>
                                    <th>Màu hiển thị</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mausacs as $mau)
                                    <tr>
                                        <td>{{ $mau->id }}</td>
                                        <td>{{ $mau->ten_mau_sac }}</td>
                                        <td>{{ $mau->ma_mau }}</td>
                                        <td>
                                            <div style="width: 15px; height: 15px; background-color: {{ $mau->ma_mau }};">
                                            </div>
                                        </td>
                                        <td>
                                            @if ($mau->trang_thai)
                                                <span class="badge bg-success">Đang hoạt động</span>
                                            @else
                                                <span class="badge bg-danger">Không hoạt động</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Thao tác<i
                                                        class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.mausacs.edit', $mau->id) }}">Sửa</a>

                                                    <form action="{{ route('admin.mausacs.destroy', $mau->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn có chắc xóa màu sắc này không?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Xóa</button>
                                                    </form>
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
