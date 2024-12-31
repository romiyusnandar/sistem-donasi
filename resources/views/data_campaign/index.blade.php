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
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data Kampanye</h1>

      <div class="mb-3">
        <a href="{{route('datacampaign.create')}}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Campaign
        </a>
    </div>

      <!-- DataTales -->
      <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                @if (Session::has('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire(
                                'Sukses',
                                '{{ Session::get('success') }}',
                                'success'
                            );
                        });
                    </script>
                @endif
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Target</th>
                              <th>Collected</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($campaigns as $item)
                            <tr>
                              <td>{{$item->id}}</td>
                              <td>
                                <img src="{{ asset('picture/campaign/' . $item->image) }}" alt="Campaign Image" width="100">
                              </td>
                              <td>{{$item->title}}</td>
                              <td>{{$item->description}}</td>
                              <td>{{$item->target_amount}}</td>
                              <td>{{ $item->collected_amount }}</td>
                              <td>{{$item->status}}</td>
                              <td><a href="/datacampaign/update/{{$item->id}}" class="btn btn-sm btn-warning text-decoration-none">Edit</a>
                                <form action="/datacampaign/delete/{{$item->id}}" method="POST" class="d-inline" onsubmit="return confirmHapus(event)">
                                  @csrf
                                  <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

  </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmHapus(event) {
        event.preventDefault(); // Menghentikan form dari pengiriman langsung

        Swal.fire({
            title: 'Yakin Hapus Data?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit(); // Melanjutkan pengiriman form
            } else {
                swal('Your imaginary file is safe!');
            }
        });
    }
</script>