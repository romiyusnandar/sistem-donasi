@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buat Donasi</div>

                <div class="card-body">
                    <h5 class="card-title">{{ $campaign->title }}</h5>
                    <p class="card-text">Target: Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                    <p class="card-text">Terkumpul: Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</p>

                    <form method="POST" action="{{ route('donations.store', $campaign->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah Donasi</label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                                id="amount" name="amount" value="{{ old('amount') }}" min="1000">
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Pesan (Opsional)</label>
                            <textarea class="form-control @error('note') is-invalid @enderror" 
                                id="note" name="note" rows="3">{{ old('note') }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Donasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 