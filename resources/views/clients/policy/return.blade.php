@extends('layouts.client')

@section('content')
<div class="container">
    <h1>Chính sách hoàn hàng</h1>
    <p>
        Chúng tôi chấp nhận hoàn hàng trong vòng 7 ngày kể từ ngày nhận sản phẩm, 
        với điều kiện sản phẩm còn nguyên tem, hộp và chưa qua sử dụng.
    </p>
    <p>
        Quy trình hoàn hàng:
        <ol>
            <li>Liên hệ bộ phận hỗ trợ khách hàng</li>
            <li>Gửi sản phẩm về địa chỉ kho</li>
            <li>Chúng tôi kiểm tra và tiến hành hoàn tiền hoặc đổi hàng</li>
        </ol>
    </p>
    <form action="#" method="post">
        @csrf
        <div>
            <label>
                <input type="checkbox" name="agree" required>
                Tôi đồng ý với chính sách hoàn hàng
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Xác nhận</button>
    </form>
</div>
@endsection
