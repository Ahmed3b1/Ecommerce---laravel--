@extends('layouts.adminmaster')

@section('content')
<div class="row">
    @if ($productreviews->isEmpty())
        <div class="col-12">
            <div class="alert alert-warning text-center">
                There are no reviews on this product.
            </div>
        </div>
    @else
        @foreach ($productreviews as $review)
            <div class="col-xl-4 d-flex align-items-start mb-3">
                <div class="avatar avatar-md me-3">
                    <img class="avatar-img" src="{{ asset('assets/img/avatars/8.jpg') }}" alt="{{ $review->user->email ?? 'User' }}">
                </div>
                <div class="card text-white bg-secondary flex-fill">
                    <div class="card-header">
                        {{ $review->user->name ?? 'Unknown User' }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->subject ?? 'No Title' }}</h5>
                        <p class="card-text">{{ $review->message }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
