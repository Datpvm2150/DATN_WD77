@extends('layouts.admin')

@section('title', 'Phản hồi khách hàng')

@section('css')
    <style>
        .list-group-item {
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .list-group-item p {
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 text-center">Phản hồi khách hàng</h1>
                    </div>
                    <div class="card-body">
                        <p><strong>Email khách hàng:</strong> {{ $lienhes->user->email }}</p>
                        <p><strong>Tên người gửi:</strong> {{ $lienhes->ten_nguoi_gui }}</p>
                        <p><strong>Nội dung liên hệ:</strong> {{ $lienhes->tin_nhan }}</p>
                        <p><strong>Ngày gửi:</strong> {{ $lienhes->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Trạng thái:</strong>
                            @if ($lienhes->trang_thai_phan_hoi == 'pending')
                                <span class="badge bg-warning">Đang chờ xử lý</span>
                            @elseif ($lienhes->trang_thai_phan_hoi == 'resolved')
                                <span class="badge bg-success">Đã xử lý</span>
                            @else
                                <span class="badge bg-secondary">Chưa xử lý</span>
                            @endif
                        </p>
                        <hr>
                        <h5 class="mb-3">Phản hồi trước đó:</h5>
                        @if ($lienhes->adminPhanHoi->count() > 0)
                            <ul class="list-group">
                                @foreach ($lienhes->adminPhanHoi as $phanHoi)
                                    <li class="list-group-item">
                                        <p><strong>Phản hồi:</strong> {{ $phanHoi->reply }}</p>
                                        <p><strong>Ngày phản hồi:</strong> {{ $phanHoi->created_at->format('d/m/Y H:i') }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Chưa có phản hồi.</p>
                        @endif
                        <hr>
                        <h5 class="mb-3">Gửi phản hồi mới:</h5>
                        <form action="{{ route('admin.lienhes.phanhoi.reply.send', $lienhes->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="reply" class="form-label">Phản hồi của bạn:</label>
                                <textarea name="reply" class="form-control" rows="4" required></textarea>
                                @error('reply')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Gửi phản hồi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection