@extends('layouts.client')
@section('content')
<div class="container text-center" style="padding: 100px 0;">
    <h1 style="font-size: 6rem; color: #F53003;">500</h1>
   <h2>Đã có lỗi xảy ra</h2>
    <p>Hệ thống gặp sự cố. Vui lòng thử lại sau hoặc quay về trang chủ.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Quay về trang chủ</a>
</div>
@endsection
