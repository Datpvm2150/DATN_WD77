@extends('layouts.admin')

@section('title')
    Thùng rác danh mục
@endsection

@section('content')
<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Thùng rác danh mục</h4>
        </div>
        <div>
            <a href="{{ route('admin.danhmucs.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($danhmucs as $danh_muc)
                        <tr>
                            <td>{{ $danh_muc->id }}</td>
                            <td>{{ $danh_muc->ten_danh_muc }}</td>
                            <td>
                                <img src="{{ asset($danh_muc->anh_danh_muc) }}" width="80" height="70" alt="">
                            </td>
                            <td>
                                <!-- Khôi phục -->
                                <form action="{{ route('admin.danhmucs.restore', $danh_muc->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                                </form>

                                <!-- Xóa vĩnh viễn -->
                                {{-- <form action="{{ route('admin.danhmucs.forceDelete', $danh_muc->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn?')">Xóa vĩnh viễn</button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Không có danh mục nào trong thùng rác</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
