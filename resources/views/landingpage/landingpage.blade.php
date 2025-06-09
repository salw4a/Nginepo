<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nginepo - Platform Penyewaan Rumah Wisata</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header */
        .header {
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #8B4513;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 40px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #8B4513;
        }

        .profile-icon {
            width: 40px;
            height: 40px;
            background: #FFA500;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        /* Hero Section */
        .hero {
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
        url("{{ asset('images/landingpage.png') }}");
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 70px;
        }



        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .hero-content p {
            font-size: 20px;
            margin-bottom: 30px;
            max-width: 600px;
        }

        .cta-button {
            background: #8B4513;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            background: #A0522D;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Popular Accommodations */
        .popular-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .section-header h2 {
            font-size: 32px;
            color: #8B4513;
            font-weight: bold;
        }

        .view-all {
            color: #8B4513;
            text-decoration: underline;
            font-weight: 500;
        }

            .accommodation-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .accommodation-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .accommodation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .card-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-radius: 15px;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 15px;
        }


        .card-content {
            padding: 15px 20px 20px;
        }

        /* About Section */
        .about-section {
            background:rgb(255, 255, 255);
            padding: 80px 20px;
            text-align: center;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .about-section h2 {
            font-size: 36px;
            color: #8B4513;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .about-logo {
            font-size: 48px;
            color: #8B4513;
            margin: 30px 0;
            font-weight: bold;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .feature-card {
            background: rgba(139, 69, 19, 0.1);
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
            color: #8B4513;
        }

        .feature-card h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #8B4513;
            font-weight: bold;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background:rgb(255, 255, 255);
            color: brown;
            padding: 50px 20px 30px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-section h4 {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .footer-section a {
            color: brown;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid brown;
            color: #DDD;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-links a {
            color: white;
            font-size: 24px;
            transition: transform 0.3s;
        }

        .social-links a:hover {
            transform: scale(1.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-content h1 {
                font-size: 36px;
            }

            .hero-content p {
                font-size: 18px;
            }

            .accommodation-grid {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    
        <!-- Header -->
        <header class="header">
        <div class="nav-container" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">
        
        <!-- Logo sebagai gambar -->
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/favicon.png') }}" alt="Nginepo Logo" style="height: 40px;">
        </a>

        <!-- Navigasi -->
        <nav>
            <ul class="nav-links" style="display: flex; gap: 20px; list-style: none;">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#katalog">Katalog</a></li>
                <li><a href="#transaksi">Transaksi</a></li>
                <li><a href="#kalender">Kalender</a></li>
            </ul>
        </nav>

        <!-- Auth: Login/Register untuk guest, profil untuk user -->
        <div class="auth-section" style="display: flex; gap: 10px; align-items: center;">
            @if(Auth::check())
                <!-- Jika sudah login, tampilkan ikon profil -->
                <a href="{{ route('penyewa.dashboard.profiles') }}" class="profile-icon" style="padding: 6px 12px; background-color:rgb(153, 65, 30); color: white; border-radius: 6px; text-decoration: none;">🐵</a>
             
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" title="Logout" style="font-size: 24px; border: none; background: none; cursor: pointer;">
                        logout
                    </button>
                </form>

            @else
                <!-- Jika belum login, tampilkan tombol Login & Register -->
                <a href="{{ route('login') }}" class="btn-login" style="padding: 6px 12px; background-color:rgb(153, 65, 30); color: white; border-radius: 6px; text-decoration: none;">Login</a>
                <!-- <a href="#" class="btn-register" style="padding: 6px 12px; background-color:rgb(155, 76, 47); color: white; border-radius: 6px; text-decoration: none;">Register</a> -->
            @endif
        </div>
    </div>
</header>


    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="hero-content">
            <h1>Selamat Datang!</h1>
            <p>Dengan Nginepo, penyewaan tempat penginapan dapat dilakukan dimana saja dan kapan saja</p>
            <a href="#katalog" class="cta-button">Booking sekarang</a>
        </div>
    </section>

    <!-- Popular Accommodations -->
    <section class="popular-section" id="katalog">
        <div class="section-header">
            <h2>Penginapan popular di Jember</h2>
            <a href="#" class="view-all">Lihat selengkapnya</a>
        </div>
        <div class="accommodation-grid">
            <div class="accommodation-card">
                <div class="card-image"><img src="images/terastanjung.png" alt="Omah Tawon"></div>
                <div class="card-content">
                    <h3 class="card-title">Pondok Rowo Indah</h3>
                    <p class="card-price">Rp 150.000 per malam</p>
                </div>
            </div>
            <div class="accommodation-card">
                <div class="card-image"><img src="images/kertanegara.png" alt="Omah Tawon"></div>
                <div class="card-content">
                    <h3 class="card-title">Omah Tawon</h3>
                    <p class="card-price">Rp 135.000 per malam</p>
                </div>
            </div>
            <div class="accommodation-card">
                <div class="card-image"><img src="images/omahkali.png" alt="Omah Tawon"></div>
                <div class="card-content">
                    <h3 class="card-title">Omah Kali Putih</h3>
                    <p class="card-price">Rp 200.000 per malam</p>
                </div>
            </div>
            <div class="accommodation-card">
                <div class="card-image">  <img src="images/omahdewe.png" alt="Omah Tawon"></div>
                <div class="card-content">
                    <h3 class="card-title">Teras Tanjung Papuma</h3>
                    <p class="card-price">Rp 250.000 per malam</p>
                </div>
            </div>
            <div class="accommodation-card">
                <div class="card-image">  <img src="images/landingpage.png" alt="Kertanegara"></div>
                <div class="card-content">
                    <h3 class="card-title">Kertanegara</h3>
                    <p class="card-price">Rp 450.000 per malam</p>
                </div>
            </div>
            <div class="accommodation-card">
                <div class="card-image">  <img src="images/rembangan.png" alt="rembangan"></div>
                <div class="card-content">
                    <h3 class="card-title">Rembangan Hill</h3>
                    <p class="card-price">Rp 300.000 per malam</p>
                </div>
            </div>
        </div>
    </section>

   <!-- About Section -->
    <section class="about-section">
        <hr class="full-width-line">
        <div class="about-container">
            <h2>About Us</h2>
            <div class="about-logo">
                <img src="{{ asset('images/favicon.png') }}" style="height: 100px;">
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏛️</div>
                    <h3>Sebuah platform untuk penyewaan rumah warga di wilayah wisata Jember</h3>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📍</div>
                    <h3>Katalog yang informatif mulai dari lokasi, harga, fasilitas serta dilengkapi dengan foto</h3>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💳</div>
                    <h3>Proses transaksi yang aman dan terdokumentasi</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
    <div class="footer-bottom"></div>
        <div class="footer-container">
            <div class="footer-section">
                <a href="#beranda">Beranda</a>
                <a href="#katalog">Katalog</a>
                <a href="#transaksi">Transaksi</a>
            </div>
            <div class="footer-section center-text">
                <p>Sistem penyewaan rumah lokal © 2025 - Platform terpercaya untuk penyewaan lokal wilayah wisata Jember</p>
            </div>
            <div class="footer-section" style="text-align: right;">
                <h4>Contact Us</h4>
                <p>+62-834-7619-2563</p>
            </div>
        </div>
            <div class="social-links">
                <a href="#">📘</a>
                <a href="#">🐦</a>
                <a href="#">📷</a>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'white';
                header.style.backdropFilter = 'none';
            }
        });

        // Add hover effect to accommodation cards
        document.querySelectorAll('.accommodation-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>