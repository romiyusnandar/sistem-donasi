@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Detail Donasi</h4>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted">Kampanye</h5>
                            <p class="lead">{{ $donation->campaign->title }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">Jumlah Donasi</h5>
                            <p class="lead font-weight-bold">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted">Status</h5>
                            <span class="badge rounded-pill bg-{{ $donation->status == 'berhasil' ? 'success' : 'warning' }} px-3 py-2">
                                {{ ucfirst($donation->status) }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">Tanggal Donasi</h5>
                            <p>{{ $donation->created_at ? $donation->created_at->format('d M Y H:i') : 'N/A' }}</p>
                        </div>
                    </div>

                    @if($donation->note)
                    <div class="mb-4">
                        <h5 class="text-muted">Pesan</h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <i class="fas fa-quote-left text-muted mr-2"></i>
                                {{ $donation->note }}
                                <i class="fas fa-quote-right text-muted ml-2"></i>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="text-center mt-4">
                        <a href="{{ route('donations.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Riwayat Donasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .badge {
        font-size: 1rem;
    }
    .lead {
        font-size: 1.1rem;
    }
</style>
@endpush