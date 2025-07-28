@extends('layouts.admin')

@section('title', 'Lịch sử ChatBot')

@section('content')
<div class="container mt-4">
    <h3>Lịch sử ChatBot</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Thời gian</th>
                <th>Câu hỏi</th>
                <th>Phản hồi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $log->question }}</td>
                <td>{!! nl2br(e($log->response)) !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
