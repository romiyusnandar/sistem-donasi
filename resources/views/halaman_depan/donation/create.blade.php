@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Buat Donasi</h4>
                </div>

                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title text-primary">{{ $campaign->title }}</h5>
                        <div class="progress mb-3" style="height: 25px;">
                            @php
                                $percentage = ($campaign->collected_amount / $campaign->target_amount) * 100;
                            @endphp
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($percentage, 2) }}%</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text"><strong>Target:</strong> Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                            <p class="card-text"><strong>Terkumpul:</strong> Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('donations.store', $campaign->id) }}">
                        @csrf
                        <div class="mb-4">
                            <label for="amount" class="form-label">Jumlah Donasi</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                    id="amount" name="amount" value="{{ old('amount') }}" min="1000" placeholder="Masukkan jumlah donasi">
                            </div>
                            @error('amount')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="note" class="form-label">Pesan (Opsional)</label>
                            <textarea class="form-control @error('note') is-invalid @enderror"
                                id="note" name="note" rows="3" placeholder="Tulis pesan dukungan Anda di sini">{{ old('note') }}</textarea>
                            @error('note')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-heart mr-2"></i> Kirim Donasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
        border-radius: 15px;
    }
    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2e59d9;
    }
</style>
@endpush