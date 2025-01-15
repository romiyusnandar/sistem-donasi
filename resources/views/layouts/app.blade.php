<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Donasi - Donasi Kita</title>
    <link rel="stylesheet" href="{{ asset('halaman_depan/css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .navbar .logo a {
            font-size: 1.5rem;
            font-weight: 600;
            color: #3498db;
            text-decoration: none;
        }
        .navbar ul li a {
            color: #333;
            font-weight: 400;
            transition: color 0.3s ease;
        }
        .navbar ul li a:hover {
            color: #3498db;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .footer {
            background-color: #34495e;
            color: #ecf0f1;
            padding: 2rem 0;
        }
        .footer-links {
            list-style: none;
            padding: 0;
        }
        .footer-links li {
            display: inline;
            margin-right: 1rem;
        }
        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-links a:hover {
            color: #ecf0f1;
        }
        .sticky-top {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
        transition: all 0.3s ease-in-out;
    }

    .sticky-top.scrolled {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .hero {
        background-color: #f8f9fa;
        padding: 80px 0;
    }

    .hero-text h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: #2c3e50;
    }

    .hero-text p {
        font-size: 1.2rem;
        color: #34495e;
        margin-bottom: 30px;
    }

    .hero-buttons .btn {
        margin-right: 15px;
    }

    .hero-image img {
        max-width: 100%;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .campaigns {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .campaigns h2 {
        font-weight: 700;
        color: #2c3e50;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .card-text {
        color: #7f8c8d;
    }

    .progress {
        height: 10px;
        border-radius: 5px;
    }

    .progress-bar {
        background-color: #3498db;
    }

    .donation-info {
        font-size: 0.9rem;
    }

    .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    .btn-secondary {
        background-color: #95a5a6;
        border-color: #95a5a6;
    }

    </style>
</head>
<body>
    <!-- Navbar -->
    <header class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <div class="logo"><a href="{{ route('home') }}"><i class="fas fa-hand-holding-heart"></i> Donasi Kita</a></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#home"><i class="fas fa-home"></i> Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#campaigns"><i class="fas fa-bullhorn"></i> Kampanye</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}"><i class="fas fa-info-circle"></i> Tentang Kami</a></li>
                    @if(Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('donations.index') }}"><i class="fas fa-history"></i> Riwayat Donasi</a></li>
                        <li class="nav-item"><a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</a></li>
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
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-hand-holding-heart"></i> Donasi Kita</h5>
                    <p>Membantu sesama dengan kebaikan.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-shield-alt"></i> Kebijakan Privasi</a></li>
                        <li><a href="#"><i class="fas fa-file-contract"></i> Syarat dan Ketentuan</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> Kontak</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="text-center">&copy; 2024 Donasi Kita. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
  window.addEventListener('scroll', function() {
      var header = document.querySelector('.sticky-top');
      header.classList.toggle('scrolled', window.scrollY > 0);
  });
</script>