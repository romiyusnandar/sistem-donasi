@extends('halaman_dashboard.index')
@section('navItem')
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
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
        <a class="nav-link" href="{{route('datauser')}}"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user fa-cog"></i>
            <span>Data User</span>
        </a>
    </li>

    <!-- Nav Item - Data campaign -->
    <li class="nav-item active">
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
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Kampanye: {{ $campaign->title }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Donatur</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Donatur</th>
                            <th>Jumlah Donasi</th>
                            <th>Tanggal Donasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $donation->user ? $donation->user->fullname : 'Anonymous' }}</td>
                            <td>Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                            <td>{{ $donation->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="{{ route('datacampaign') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection