@extends('layouts.admin')

@section('css')
    <link href="{{ asset('assets/admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Danh sách admin</h5>
                    <a href="{{ route('admin.admins.create') }}" class="btn btn-success">Thêm mới</a>
                </div>
                <!-- Hiển thị thông báo thành công -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <!-- Hiển thị thông báo lỗi -->
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                @endif
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Ngày tạo</th>
                            <th>Tuổi</th>
                            <th>Chức vụ</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->ten }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->so_dien_thoai }}</td>
                                <td>{{ $admin->created_at ? $admin->created_at->format('d/m/Y') : 'Chưa xác định' }}</td>
                                <td>{{ \Carbon\Carbon::parse($admin->ngay_sinh)->age }}</td>
                                <td>{{ $admin->getRoleNames()->first() }}</td>
                                <td>
                                    <a href="{{ route('admin.admins.show', $admin->id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.flash.min.js') }}</script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}</script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}</script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}</script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/datatable.init.js') }}"></script>
@endsection