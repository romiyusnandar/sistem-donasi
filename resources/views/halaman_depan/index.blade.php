
  @extends('layouts.app')

  @section('content')
  <!-- Hero Section -->
  <section id="home" class="hero">
    <div class="container">
        <div class="hero-text">
            <div class="hero-text">
                <h1>Hi {{ session('user_name') }}, Bersama Kita Bisa Membantu</h1>
                <p>Setiap donasi Anda membawa harapan bagi mereka yang membutuhkan.</p>
                <div class="hero-buttons">
                    <a href="{{ route('home') }}#campaigns" class="btn btn-primary">Mulai Donasi</a>
                    <a href="#campaigns" class="btn btn-secondary">Lihat Kampanye</a>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <img src="https://cdn1-production-images-kly.akamaized.net/JZlJmoMKCC3IbT__OULCjTs6jkY=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4317154/original/093303000_1675831393-Thumbnail_Liputan6.com-4.jpg" alt="Donasi Kita Hero Image">
        </div>
    </div>
</section>

<!-- Campaign Cards -->
  <section id="campaigns" class="campaigns">
    <div class="container">
        <h2>Kampanye Terbaru</h2>
        <div class="card-container">
            @foreach ($campaigns as $campaign)
                <div class="card">
                    <img src="{{ asset('picture/campaign/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                    <div class="card-content">
                      <h3>{{ $campaign->title }}</h3>
                      <p>{{ $campaign->description }}</p>
                    </div>

                    <div class="card-footer">
                      <div class="progress">
                          @php
                              $progress = ($campaign->collected_amount / $campaign->target_amount) * 100;
                          @endphp
                          <div class="progress-bar" style="width: {{ $progress }}%;"></div>
                      </div>
                      <p class="donation-info">
                          Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }} /
                          Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                      </p>
                      @if($campaign->status == 'active')
                          <a href="{{ route('donations.create', $campaign->id) }}" class="btn btn-primary">Donasi Sekarang</a>
                      @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection