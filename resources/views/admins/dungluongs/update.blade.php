@extends('layouts.admin')
@section('title', 'Cập nhật dung lượng')
@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Cập nhật dung lượng</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Cập nhật dung lượng</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.dungluongs.update', $dungluongs->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="ten_dung_luong" class="form-label">Tên Dung Lượng</label>
                                        <input type="text" class="form-control" id="ten_dung_luong" name="ten_dung_luong"
                                            value="{{ $dungluongs->ten_dung_luong }}">
                                        @error('ten_dung_luong')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Trạng thái</label>
                                        <select name="trang_thai" id="">
                                            <option value="1" {{ $dungluongs->trang_thai == '1' ? 'selected' : '' }}>
                                                Còn hàng</option>
                                            <option value="0" {{ $dungluongs->trang_thai == '0' ? 'selected' : '' }}>
                                                Hết hàng</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
