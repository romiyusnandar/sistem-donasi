@extends('layouts.app')
@section('content')
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
@endsection
    <link rel="stylesheet" href="{{ asset('halaman_depan/css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .about-page {
            padding: 50px 0;
        }
        .about-content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 40px;
        }
        .about-title {
            color: #3498db;
            text-align: center;
            margin-bottom: 30px;
        }
        .about-section {
            margin-bottom: 40px;
        }
        .about-section h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .features-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .feature-item {
            flex-basis: calc(50% - 20px);
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .feature-item:hover {
            transform: translateY(-5px);
        }
        .feature-item i {
            font-size: 2em;
            color: #3498db;
            margin-bottom: 10px;
        }
        .contact-info p {
            margin-bottom: 10px;
        }
        .contact-info i {
            color: #3498db;
            margin-right: 10px;
        }
    </style>
