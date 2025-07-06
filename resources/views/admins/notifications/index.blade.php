@extends('layouts.admin')

@section('title', 'Tất cả thông báo')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 text-center">Tất cả thông báo</h1>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (count($notificationData) > 0)
                            <ul class="list-group">
                                @foreach ($notificationData as $notification)
                                    <li class="list-group-item {{ $notification['is_read'] ? 'bg-light' : '' }}">
                                        <a href="{{ $notification['route'] }}" class="text-decoration-none">
                                            <div class="d-flex align-items-center">
                                                <div class="notify-icon me-3">
                                                    <img src="{{ $notification['avatar'] }}" class="img-fluid rounded-circle"
                                                        style="width: 40px; height: 40px;" alt="" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="notify-details mb-0">{{ $notification['name'] }}</p>
                                                        <small
                                                            class="text-muted">{{ $notification['created_at']->diffForHumans() }}</small>
                                                    </div>
                                                    <p class="mb-0 user-msg">
                                                        <small class="fs-14">{!! $notification['message'] !!}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-3">
                                {{ $notifications->links() }}
                            </div>
                        @else
                            <p>Không có thông báo nào.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection