<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Donasi - Donasi Kita</title>
    <link rel="stylesheet" href="{{ asset('halaman_depan/css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="container">
            <div class="logo"><a href="#">Donasi Kita</a></div>
            <nav>
                <ul>
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#campaigns">Kampanye</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    @if(Auth::check())
                        <li><a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{ route('login') }}" class="btn btn-primary">Login</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-text">
                <div class="hero-text">
                    <h1>Hi {{ session('user_name') }}, Bersama Kita Bisa Membantu</h1>
                    <p>Setiap donasi Anda membawa harapan bagi mereka yang membutuhkan.</p>
                    <div class="hero-buttons">
                        <a href="#donate" class="btn btn-primary">Mulai Donasi</a>
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
                          <a href="/home/campaign/{{$campaign->id}}" class="btn btn-primary">Donasi Sekarang</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- About Us Section -->
    <section id="about" class="about">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>Donasi Kita adalah platform yang menghubungkan para donatur dengan berbagai kampanye sosial yang membutuhkan bantuan. Kami berkomitmen untuk transparansi dan akuntabilitas dalam setiap donasi yang diterima.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Donasi Kita. Hak Cipta Dilindungi.</p>
            <ul class="footer-links">
                <li><a href="#">Kebijakan Privasi</a></li>
                <li><a href="#">Syarat dan Ketentuan</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>