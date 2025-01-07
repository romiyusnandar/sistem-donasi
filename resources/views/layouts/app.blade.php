<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Donasi - Donasi Kita</title>
    <link rel="stylesheet" href="{{ asset('halaman_depan/css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="container">
            <div class="logo"><a href="{{ route('home') }}">Donasi Kita</a></div>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}#home">Beranda</a></li>
                    <li><a href="{{ route('home') }}#campaigns">Kampanye</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
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

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 