@extends('layouts.adminmaster')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <strong>User Profile</strong>
    </div>

    <div class="card-body">
        <div class="row align-items-center">
            <!-- User Image -->
            <div class="col-md-4 text-center">
                <img 
                    src="{{ $user->imagepath ? asset('uploads/'.$user->imagepath) : asset('images/default-user.jpg') }}" 
                    alt="{{ $user->name }}"
                    class="rounded-circle border border-3"
                    style="width: 230px; height: 230px; object-fit: cover;"
                >
            </div>

            <!-- User Information -->
            <div class="col-md-8">
                <dl class="row mb-0">
                    <dt class="col-sm-4 fw-semibold">Name:</dt>
                    <dd class="col-sm-8 h5">{{ $user->name }}</dd>

                    <dt class="col-sm-4 fw-semibold">Email:</dt>
                    <dd class="col-sm-8 h5">{{ $user->email }}</dd>

                    <dt class="col-sm-4 fw-semibold">Phone:</dt>
                    <dd class="col-sm-8 h5">{{ $user->phone ?? '—' }}</dd>

                    <dt class="col-sm-4 fw-semibold">Country:</dt>
                    <dd class="col-sm-8 h5">{{ $user->country ?? '—' }}</dd>

                    <dt class="col-sm-4 fw-semibold">Address:</dt>
                    <dd class="col-sm-8 h5">{{ $user->address ?? '—' }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="card mt-4">
    <div class="card-header">
        <strong>Recent Activity</strong>
    </div>
    <div class="card-body text-center">
        <h5 class="fw-semibold">Total Visits ({{ $from->format('M d') }} - {{ $to->format('M d') }})</h5>
        <h2 class="text-primary">{{ $user->visits_between ?? 0 }}</h2>

        <div class="progress mt-3" style="height: 10px;">
            <div class="progress-bar bg-primary" 
                style="width: {{ min(($user->visits_between / 100) * 100, 100) }}%">
            </div>
        </div>

        <p class="mt-3 text-muted">
            Last Activity: 
            {{ $user->last_activity_at ? \Carbon\Carbon::parse($user->last_activity_at)->diffForHumans() : 'No activity yet' }}
        </p>
    </div>
</div>

@endsection
