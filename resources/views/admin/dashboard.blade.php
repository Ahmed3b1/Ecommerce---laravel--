@extends('layouts.adminmaster')


@section('content')
    

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-primary">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">{{ $totalUsers }} <span class="fs-6 fw-normal">(-12.4%
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                    </svg>)</span></div>
                <div>Users</div>
              </div>
              <div class="dropdown">
                <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                  </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
              </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart1" height="70" width="216" style="display: block; box-sizing: border-box; height: 70px; width: 216px;"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-info">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">{{ $totalProducts }} <span class="fs-6 fw-normal">(40.9%
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                    </svg>)</span></div>
                <div>Total Products</div>
              </div>
              <div class="dropdown">
                <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                  </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
              </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart2" height="70" width="216" style="display: block; box-sizing: border-box; height: 70px; width: 216px;"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-warning">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">{{$totalOrders}} <span class="fs-6 fw-normal">(84.7%
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                    </svg>)</span></div>
                <div>Total Orders</div>
              </div>
              <div class="dropdown">
                <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                  </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
              </div>
            </div>
            <div class="c-chart-wrapper mt-3" style="height:70px;">
              <canvas class="chart" id="card-chart3" height="70" width="248" style="display: block; box-sizing: border-box; height: 70px; width: 248px;"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-danger">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">{{ $earnings }}<span class="fs-6 fw-normal">(-23.6%
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                    </svg>)</span></div>
                <div>Total Earnings</div>
              </div>
              <div class="dropdown">
                <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                  </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
              </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart4" height="70" width="216" style="display: block; box-sizing: border-box; height: 70px; width: 216px;"></canvas>
            <div class="chartjs-tooltip" style="opacity: 0; left: 74.7812px; top: 138.2px;"><table style="margin: 0px;"><thead class="chartjs-tooltip-header"><tr class="chartjs-tooltip-header-item" style="border-width: 0px;"><th style="border-width: 0px;">May</th></tr></thead><tbody class="chartjs-tooltip-body"><tr class="chartjs-tooltip-body-item"><td style="border-width: 0px;"><span style="background: rgba(255, 255, 255, 0.2); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 34</td></tr></tbody></table></div></div>
          </div>
        </div>
        <!-- /.col-->
    </div>




    <div class="card mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <h4 class="card-title mb-0">Traffic</h4>
              <div class="small text-body-secondary">January - July 2023</div>
            </div>
            <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
              <div class="btn-group btn-group-toggle mx-3" data-coreui-toggle="buttons">
                <input class="btn-check" type="radio" name="options" id="option1" autocomplete="off">
                <label class="btn btn-outline-secondary" for="option1">Day</label>

                <input class="btn-check" type="radio" name="options" id="option2" autocomplete="off" checked>
                <label class="btn btn-outline-secondary" for="option2">Month</label>

                <input class="btn-check" type="radio" name="options" id="option3" autocomplete="off">
                <label class="btn btn-outline-secondary" for="option3">Year</label>
              </div>


              <button class="btn btn-primary" type="button">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                </svg>
              </button>
            </div>
          </div>
          <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
            <canvas class="chart" id="main-chart" height="300" width="491" style="display: block; box-sizing: border-box; height: 300px; width: 491px;"></canvas>
          </div>
        </div>
        <div class="card-footer">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-5 g-4 mb-2 text-center">
            <div class="col">
              <div class="text-body-secondary">Visits</div>
              <div class="fw-semibold text-truncate">29.703 Users (40%)</div>
              <div class="progress progress-thin mt-2">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col">
              <div class="text-body-secondary">Unique</div>
              <div class="fw-semibold text-truncate">24.093 Users (20%)</div>
              <div class="progress progress-thin mt-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col">
              <div class="text-body-secondary">Pageviews</div>
              <div class="fw-semibold text-truncate">78.706 Views (60%)</div>
              <div class="progress progress-thin mt-2">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col">
              <div class="text-body-secondary">New Users</div>
              <div class="fw-semibold text-truncate">22.123 Users (80%)</div>
              <div class="progress progress-thin mt-2">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col d-none d-xl-block">
              <div class="text-body-secondary">Bounce Rate</div>
              <div class="fw-semibold text-truncate">40.15%</div>
              <div class="progress progress-thin mt-2">
                <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header">Traffic &amp; Sales</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-6">
                      <div class="border-start border-start-4 border-start-info px-3 mb-3">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2 text-danger">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                          </svg>
                          <div>Best Selling Products</div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                    
                    <!-- /.col-->
                    
                  </div>
                  <!-- /.row-->
                  <hr class="mt-0">


                  {{-- 🥇 Best Selling Products --}}
                  <div class="progress-group mb-4">
                    

                    @foreach($bestsellerProducts as $product)
                      @php
                        $percentage = $bestsellerProducts->max('sold') > 0 
                            ? ($product['sold'] / $bestsellerProducts->max('sold')) * 100 
                            : 0;
                      @endphp
                      <div class="progress-group-header small mt-2">
                        <span>{{ $product['name'] }}</span>
                        <span class="ms-auto fw-semibold me-2">{{ $product['sold'] }}</span>
                      </div>
                      <div class="progress-group-bars">
                        <div class="progress progress-thin">
                          <div class="progress-bar bg-info" role="progressbar" 
                              style="width: {{ $percentage }}%" 
                              aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    @endforeach
                  </div>

                  
                </div>
                <!-- /.col-->
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-6">
                      <div class="border-start border-start-4 border-start-warning px-3 mb-3">
                        <div class="progress-group-header">           
                          <svg class="icon icon-lg me-2 text-success">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                          </svg>
                          <div class="small text-body-secondary text-truncate">Most Ordering Users</div>
                        </div>
                        
                      </div>
                    </div>
                    <!-- /.col-->
                    
                    <!-- /.col-->
                  </div>
                  <!-- /.row-->
                  <hr class="mt-0">
                  
                  
                  {{-- 👑 Most Ordering Users --}}
                  <div class="progress-group">
                    

                    @foreach($topUsers as $user)
                      @php
                        $percentage = $topUsers->max('total_orders') > 0 
                            ? ($user['total_orders'] / $topUsers->max('total_orders')) * 100 
                            : 0;
                      @endphp
                      <div class="progress-group-header small mt-2">
                        <span>{{ $user['name'] }}</span>
                        <span class="ms-auto fw-semibold me-2">{{ $user['total_orders'] }}</span>
                      </div>
                      <div class="progress-group-bars">
                        <div class="progress progress-thin">
                          <div class="progress-bar bg-warning" role="progressbar" 
                              style="width: {{ $percentage }}%" 
                              aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  

                </div>
                <!-- /.col-->
              </div>
              <!-- /.row--><br>
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
                              <div class="avatar avatar-md">
                                <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com">
                                <span class="avatar-status bg-success"></span>
                              </div>
                            </td>
                            <td>
                              <div class="text-nowrap">{{ $user['name'] }}</div>
                            </td>
                            <td class="text-center">
                              <svg class="icon icon-xl">
                                <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                              </svg>
                            </td>

                            <td>
                              <div class="d-flex justify-content-between align-items-baseline">
                                <div class="fw-semibold">{{ $user->visits_between }}</div>
                                <div class="text-nowrap small text-body-secondary ms-3">{{ $from->format('M d, Y') }} - {{ $to->format('M d, Y') }}</div>
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
                                <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" href="#">Info</a>
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item text-danger" href="#">Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>

                          
                          @if ($loop->iteration == 6)
                            @break
                          @endif

                      @endforeach

                      </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
    </div>


    


@endsection