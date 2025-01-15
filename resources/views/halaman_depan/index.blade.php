@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="hero-text">
                    <h1>Hai {{ session('user_name') }}, Bersama Kita Bisa Membantu</h1>
                    <p>Setiap donasi Anda membawa harapan bagi mereka yang membutuhkan.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('home') }}#campaigns" class="btn btn-primary">Mulai Donasi</a>
                        <a href="#campaigns" class="btn btn-outline-secondary">Lihat Kampanye</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hero-image">
                    <img src="https://cdn1-production-images-kly.akamaized.net/JZlJmoMKCC3IbT__OULCjTs6jkY=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4317154/original/093303000_1675831393-Thumbnail_Liputan6.com-4.jpg" alt="Donasi Kita Hero Image">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Campaign Cards -->
<section id="campaigns" class="campaigns py-5">
    <div class="container">
        <h2 class="text-center mb-5">Kampanye Terbaru</h2>
        <div class="row">
            @foreach ($campaigns as $campaign)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('picture/campaign/' . $campaign->image) }}" class="card-img-top" alt="{{ $campaign->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $campaign->title }}</h5>
                            <p class="card-text">{{ Str::limit($campaign->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="progress mb-3">
                                @php
                                    $progress = ($campaign->collected_amount / $campaign->target_amount) * 100;
                                @endphp
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="donation-info small text-muted">
                                Terkumpul: Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}<br>
                                Target: Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                            </p>
                            @if($campaign->status == 'aktif')
                                <a href="{{ route('donations.create', $campaign->id) }}" class="btn btn-primary btn-block">Donasi Sekarang</a>
                            @else
                                <button class="btn btn-secondary btn-block" disabled>Kampanye Berakhir</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection