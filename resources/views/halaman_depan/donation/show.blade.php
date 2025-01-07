@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Donasi</div>

                <div class="card-body">
                    <div class="mb-3">
                        <h5>Campaign</h5>
                        <p>{{ $donation->campaign->title }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Jumlah Donasi</h5>
                        <p>Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Status</h5>
                        <p><span class="badge bg-{{ $donation->status == 'completed' ? 'success' : 'warning' }}">
                            {{ $donation->status }}
                        </span></p>
                    </div>

                    <div class="mb-3">
                        <h5>Tanggal</h5>
                        <td>{{ $donation->created_at ? $donation->created_at->format('d M Y H:i') : 'N/A' }}</td>
                    </div>

                    @if($donation->note)
                    <div class="mb-3">
                        <h5>Pesan</h5>
                        <p>{{ $donation->note }}</p>
                    </div>
                    @endif

                    <a href="{{ route('donations.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection