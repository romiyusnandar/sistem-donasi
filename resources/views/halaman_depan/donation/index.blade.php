@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Riwayat Donasi Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Campaign</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $index => $donation)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $donation->campaign->title }}</td>
                    <td>Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge bg-{{ $donation->status == 'completed' ? 'success' : 'warning' }}">
                            {{ $donation->status }}
                        </span>
                    </td>
                    <td>{{ $donation->created_at ? $donation->created_at->format('d M Y H:i') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('donations.show', $donation->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection