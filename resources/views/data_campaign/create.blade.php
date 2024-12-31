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
<div class="col-12 grid-margin stretch-card">
  <div class="card shadow">
      <div class="card-body">
          <h4 class="card-title mb-4">Tambah Campaign</h4>

          <!-- Menampilkan error jika ada -->
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <!-- Form Tambah Campaign -->
          <form class="forms-sample" method="POST" action="{{ route('datacampaign.submit') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul Campaign</label>
                <input type="text" class="form-control" id="title" placeholder="Judul Campaign"
                    name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" rows="4"
                    placeholder="Deskripsikan tujuan campaign..." name="description" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="goal">Target Donasi (Rp)</label>
                <input type="number" class="form-control" id="goal" placeholder="1000000"
                    name="target_amount" value="{{ old('target_amount') }}" required>
            </div>

            <div class="form-group">
                <label for="collected_amount">Jumlah Donasi Terkumpul (Rp)</label>
                <input type="number" class="form-control" id="collected_amount" placeholder="0"
                    name="collected_amount" value="{{ old('collected_amount', 0) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status Campaign</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Gambar Campaign</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>

            <div class="form-group">
                <label for="created_by">Kampanye dibuat oleh</label>
                <input type="number" class="form-control" id="created_by"
                       name="created_by" value="{{ auth()->user()->id }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary me-2">Tambah</button>
            <a href="{{ route('datacampaign') }}" class="btn btn-light">Kembali</a>
        </form>

      </div>
  </div>
</div>

@endsection