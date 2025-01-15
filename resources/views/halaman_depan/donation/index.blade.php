@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Riwayat Donasi Saya</h2>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Filter Form -->
                    <form action="{{ route('donations.index') }}" method="GET" class="mb-4">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="campaign_filter" class="col-form-label">Filter Kampanye:</label>
                            </div>
                            <div class="col-md-4">
                                <select name="campaign_id" id="campaign_filter" class="form-select">
                                    <option value="">Semua Kampanye</option>
                                    @foreach($campaigns as $campaign)
                                        <option value="{{ $campaign->id }}" {{ request('campaign_id') == $campaign->id ? 'selected' : '' }}>
                                            {{ $campaign->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kampanye</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($donations as $index => $donation)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ Str::limit($donation->campaign->title, 30) }}</td>
                                    <td class="fw-bold">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-{{ $donation->status == 'berhasil' ? 'success' : 'warning' }}">
                                            {{ ucfirst($donation->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $donation->created_at ? $donation->created_at->format('d M Y H:i') : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('donations.show', $donation->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <i class="fas fa-donate fa-3x mb-3 text-muted"></i>
                                        <p class="mb-0">Tidak ada donasi ditemukan.</p>
                                        @if(request('campaign_id'))
                                            <p class="mb-2">Coba pilih kampanye lain atau lihat semua donasi.</p>
                                        @else
                                            <p class="mb-2">Mulai berbagi kebaikan sekarang!</p>
                                        @endif
                                        <a href="{{ route('donations.index') }}" class="btn btn-primary mt-2">Lihat Kampanye</a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $donations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .badge {
        font-size: 0.8rem;
    }
</style>
@endpush