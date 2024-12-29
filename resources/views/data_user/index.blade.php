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
    <li class="nav-item active">
        <a class="nav-link" href="{{route('datauser')}}"
            aria-expanded="true" aria-controls="collapseTwo">
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

    <div class="nav-item">
      <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
      <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>

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
      <h1 class="h3 mb-2 text-gray-800">Data User</h1>

      <!-- DataTales -->
      <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Updated</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $item)
                            <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->fullname}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{$item->role}}</td>
                              <td>{{$item->updated_at}}</td>
                              <td><a href="/datauser/edit/{{$item->id}}" class="btn btn-sm btn-warning text-decoration-none">Edit</a> |
                                <form action="/datauser/delete/{{$item->id}}" method="POST" class="d-inline" onsubmit="return confirmHapus(event)">
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