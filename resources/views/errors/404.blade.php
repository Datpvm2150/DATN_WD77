@extends('layouts.client')
@section('content')
<div class="container text-center" style="padding: 100px 0;">
    <h1 style="font-size: 6rem; color: #F53003;">404</h1>
    <h2>Không tìm thấy trang</h2>
    <p>Trang bạn đang tìm kiếm không tồn tại hoặc đã bị xóa.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Quay về trang chủ</a>
</div>
@endsection

