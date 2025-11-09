@extends('layouts.adminmaster')


@section('content')
    


    <div class="table-responsive">
        <table class="table border mb-0">
            <thead class="fw-semibold text-nowrap">
            <tr class="align-middle">
                <th class="bg-body-secondary text-center">
                <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                </svg>
                </th>
                <th class="bg-body-secondary">User</th>
                <th class="bg-body-secondary text-center">role</th>
                <th class="bg-body-secondary">Usage</th>
                <th class="bg-body-secondary text-center">Registration date</th>
                <th class="bg-body-secondary">Activity</th>
                <th class="bg-body-secondary"></th>
            </tr>
            </thead>
            <tbody>

            @foreach ($users as $user)
                
                <tr class="align-middle">
                    <td class="text-center">
                    <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                    </td>
                    <td>
                    <div class="text-nowrap"><a href="{{ route('adminuserprofile' , $user->id) }}">{{ $user['name'] }}</a></div>
                
                    </td>
                    <td class="text-center">
                    <svg class="icon icon-xl">
                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                    </svg>
                    </td>

                    <td>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="fw-semibold"> {{ $user->visits_between }}</div>
                        <div class="text-nowrap small text-body-secondary ms-3"> {{ $from->format('M d, Y') }} - {{ $to->format('M d, Y') }}</div>
                    </div>
                    <div class="progress progress-thin">
                        @php
                            $percent = $user->visits_between > 100 ? 100 : $user->visits_between;
                        @endphp
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </td>

                    <td class="text-center">{{ $user->created_at->format('M d, Y') }}</td>

                    <td>
                    <div class="small text-body-secondary">Last login</div>
                    <div class="fw-semibold text-nowrap">
                         @if($user->last_activity_at)
                            {{ \Carbon\Carbon::parse($user->last_activity_at)->diffForHumans() }}
                        @else
                            No activity yet
                        @endif
                    </div>
                    </td>

                    <td>
                    <div class="dropdown">
                        <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                        </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                    </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>



@endsection