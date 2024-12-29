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
                <div class="card">
                    <img src="https://www.dompetdhuafa.org/wp-content/uploads/2022/04/WhatsApp-Image-2022-04-26-at-11.48.18-AM-768x768.jpeg" alt="Kampanye Pendidikan Anak">
                    <h3>Pendidikan untuk Anak Pedalaman</h3>
                    <p>Bantu anak-anak di pedalaman untuk mendapatkan akses pendidikan yang layak.</p>
                    <div class="progress">
                        <div class="progress-bar" style="width: 50%;"></div>
                    </div>
                    <p class="donation-info">Rp50.000.000 / Rp100.000.000</p>
                    <a href="#" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                <div class="card">
                    <img src="https://digital-api.dompetdhuafa.org/storage/114439/conversions/cf2ce08c7a0b6cc1b9227e7284f0d163-large.png" alt="Kampanye Bantuan Medis">
                    <h3>Bantuan Medis untuk Lansia</h3>
                    <p>Berikan bantuan medis kepada lansia yang membutuhkan perawatan kesehatan.</p>
                    <div class="progress">
                        <div class="progress-bar" style="width: 75%;"></div>
                    </div>
                    <p class="donation-info">Rp75.000.000 / Rp100.000.000</p>
                    <a href="#" class="btn btn-primary">Donasi Sekarang</a>
                </div>
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