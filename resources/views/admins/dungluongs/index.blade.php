@extends('layouts.admin')
@section('title', 'Danh sách dung lượng')
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
                <h4 class="fs-18 fw-semibold m-0">Danh sách dung lượng</h4>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">
                                <h5 class="card-title mb-0">Danh sách dung lượng</h5>
                            </div>
                            <div>
                                <a href="{{ route('admin.dungluongs.create') }}" class="btn btn-success">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered dt-responsive table-responsive nowrap" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Dung lượng</th>
                                    <th scope="col">Hành động</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dungluongs as $gb)
                                    <tr class="">
                                        <td>{{ $gb->id }}</td>
                                        <td>{{ $gb->ten_dung_luong }}</td>
                                        <td>
                                            @if ($gb->trang_thai == 1)
                                                <span class="badge badge-success bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Thao tác<i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('admin.dungluongs.edit', $gb->id) }}"
                                                            class="dropdown-item">Sửa</a>
                                                        @if ($gb->trang_thai == 1)
                                                            <form
                                                                action="{{ route('admin.dungluongs.onOffDungLuong', $gb->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('post')
                                                                <button class="dropdown-item">Ngừng hoạt động</button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('admin.dungluongs.onOffDungLuong', $gb->id) }}" method="POST">
                                                                @csrf
                                                                @method('post')
                                                                <button class="dropdown-item">Hoạt động</button>

                                                            </form>
                                                        @endif
                                                        <form action="{{ route('admin.dungluongs.destroy', $gb->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Bạn có chắc xóa kích cỡ dung lượng này không?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">Xóa</button>
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
