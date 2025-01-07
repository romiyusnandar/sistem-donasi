<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Donasi Kita</title>
    <link rel="stylesheet" href="{{ asset('halaman_depan/css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="container">
            <div class="logo"><a href="/">Donasi Kita</a></div>
            <nav>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/#campaigns">Kampanye</a></li>
                    <li><a href="/tentang-kami" class="active">Tentang Kami</a></li>
                    @if(Auth::check())
                        <li><a href="{{ route('donations.index') }}">Riwayat Donasi</a></li>
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

    <!-- About Content -->
    <div class="about-page">
        <div class="container">
            <div class="about-content">
                <h1 class="about-title">Tentang Donasi Kita</h1>

                <div class="about-section">
                    <h2>Visi Kami</h2>
                    <p>Menjadi platform donasi terpercaya yang menghubungkan para donatur dengan mereka yang membutuhkan, menciptakan dampak positif bagi masyarakat Indonesia.</p>
                </div>

                <div class="about-section">
                    <h2>Misi Kami</h2>
                    <ul>
                        <li>Menyediakan platform donasi yang aman, transparan, dan mudah digunakan</li>
                        <li>Memfasilitasi berbagai kampanye sosial untuk membantu sesama</li>
                        <li>Memastikan setiap donasi tersalurkan dengan tepat sasaran</li>
                        <li>Mengedukasi masyarakat tentang pentingnya berbagi dan gotong royong</li>
                    </ul>
                </div>

                <div class="about-section">
                    <h2>Mengapa Memilih Kami?</h2>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <h3>Aman & Terpercaya</h3>
                            <p>Sistem keamanan berlapis dan verifikasi kampanye yang ketat</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-hand-holding-heart"></i>
                            <h3>Mudah Berdonasi</h3>
                            <p>Proses donasi yang simpel dan cepat</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-chart-line"></i>
                            <h3>Transparan</h3>
                            <p>Laporan penggunaan dana yang jelas dan terperinci</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-users"></i>
                            <h3>Komunitas Peduli</h3>
                            <p>Bagian dari komunitas yang peduli sesama</p>
                        </div>
                    </div>
                </div>

                <div class="about-section">
                    <h2>Tim Kami</h2>
                    <p>Kami adalah tim yang berkomitmen untuk memberikan platform terbaik bagi mereka yang ingin berbagi kebaikan. Dengan latar belakang yang beragam, kami bersatu dalam misi untuk memudahkan setiap orang melakukan kebaikan.</p>
                </div>

                <div class="about-section">
                    <h2>Hubungi Kami</h2>
                    <div class="contact-info">
                        <p><i class="fas fa-envelope"></i> Email: info@donasikita.com</p>
                        <p><i class="fas fa-phone"></i> Telepon: (021) 1234-5678</p>
                        <p><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Contoh No. 123, Jakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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