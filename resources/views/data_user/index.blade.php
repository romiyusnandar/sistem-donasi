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
                <div class="mb-3">
                  <input type="text" id="searchInput" class="form-control" placeholder="Cari user...">
                </div>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Peran</th>
                              <th>Diperbarui Pada</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $item)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{$item->fullname}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{$item->role}}</td>
                              <td>{{$item->updated_at}}</td>
                              <td><a href="/datauser/update/{{$item->id}}" class="btn btn-sm btn-warning text-decoration-none">Edit</a>
                                <form action="/datauser/delete/{{$item->id}}" method="POST" class="d-inline" onsubmit="return confirmHapus(event)">
                                  @csrf
                                  <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                  </table>
                  <div id="noResultsMessage" style="display: none;" class="text-center mt-3">
                    <p>Tidak ada hasil yang ditemukan.</p>
                  </div>
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

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('dataTable');
        const rows = table.getElementsByTagName('tr');
        const noResultsMessage = document.getElementById('noResultsMessage');

        searchInput.addEventListener('keyup', function() {
            const searchTerm = searchInput.value.toLowerCase();
            let visibleRowCount = 0;

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent.toLowerCase();
                    if (cellText.includes(searchTerm)) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    row.style.display = '';
                    visibleRowCount++;
                } else {
                    row.style.display = 'none';
                }
            }

            // Tampilkan atau sembunyikan pesan "tidak ada hasil"
            if (visibleRowCount === 0) {
                noResultsMessage.style.display = 'block';
                table.style.display = 'none';
            } else {
                noResultsMessage.style.display = 'none';
                table.style.display = '';
            }
        });
    });
</script>