@extends('layouts.admin')
@section('title','Thêm mới dung lượng')
@section('css')

@endsection
@section('content')
<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
<div class="flex-grow-1">
    <h4 class="fs-18 fw-semibold m-0">Thêm mới dung lượng</h4>
</div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Thêm mới dung lượng</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('admin.dungluongs.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="ten_dung_luong" class="form-label">Tên dung lượng</label>
                                <input type="text" class="form-control" id="ten_dung_luong" name="ten_dung_luong"
                                placeholder="Tên dung lượng" value="{{ old('ten_dung_luong')}}">
                                @error('ten_dung_luong')
                                <p class="text-danger">{{ $message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection

