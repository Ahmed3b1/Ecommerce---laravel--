@extends('layouts.adminmaster')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">كل الإشعارات</h4>

    <div class="list-group shadow-sm">
        @forelse($notifications as $notification)
            <a href="#"
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                      {{ $notification->read_at ? '' : 'list-group-item-info' }}">
                <div>
                    <div class="fw-bold">{{ $notification->data['message'] ?? 'إشعار جديد' }}</div>
                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                </div>

                @if(!$notification->read_at)
                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-success">تحديد كمقروء</button>
                    </form>
                @endif
            </a>
        @empty
            <div class="text-center text-muted py-3">لا توجد إشعارات</div>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $notifications->links() }}
    </div>
</div>
@endsection
