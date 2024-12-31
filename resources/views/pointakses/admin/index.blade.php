@extends('halaman_dashboard.index')
@section('navItem')
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Data user -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('datauser')}}">
            <i class="fas fa-user fa-cog"></i>
            <span>Data User</span>
        </a>
    </li>

    <!-- Nav Item - Data campaign -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('datacampaign')}}">
            <i class="fas fa-map-marked-alt"></i>
            <span>Data Kampanye</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                  class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      </div>

      <!-- Content Row -->
      <div class="row">

          <!-- User info -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{Auth::user()->email}}</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{Auth::user()->fullname}}</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-user fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Role info -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                  Role</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{Auth::user()->role}}</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Total user -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total User
                              </div>
                              <div class="row no-gutters align-items-center">
                                  <div class="col-auto">
                                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalUser}}</div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-user fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Kampanye -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                  Total Kampanye</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalCampaign}}</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Content Row -->

      <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                  <div
                      class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Donasi Terbaru</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                      <ul class="list-unstyled">
                          @foreach($recentDonations as $donation)
                          <li class="media mb-3">
                              <img src="{{ asset('picture/accounts/' . ($donation->user->gambar ?? 'default.jpg')) }}" class="mr-3 rounded-circle" alt="{{ $donation->user->fullname }}" style="width: 50px; height: 50px; object-fit: cover;">
                              <div class="media-body">
                                  <h6 class="mt-0 mb-1">
                                      <strong class="text-primary">{{ $donation->user->fullname }}</strong>
                                  </h6>
                                  <p class="mb-0">
                                      Berdonasi <strong class="text-success">Rp {{ number_format($donation->amount, 0, ',', '.') }}</strong>
                                      ke kampanye "<strong class="text-info">{{ $donation->campaign->title }}</strong>"
                                  </p>
                              </div>
                          </li>
                          @if(!$loop->last)
                              <hr class="my-2">
                          @endif
                          @endforeach
                      </ul>
                      @if(count($recentDonations) == 0)
                          <p class="text-center text-muted">Belum ada donasi terbaru.</p>
                      @endif
                  </div>
              </div>
          </div>

      </div>

  </div>
  <!-- /.container-fluid -->
@endsection