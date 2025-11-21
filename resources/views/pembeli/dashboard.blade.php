<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembeli | Belanja Yuk!</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #20c997; /* Hijau Akses (Tosca) */
            --bg-light: #f7f9fc; /* Background Halaman Sangat Ringan */
            --promo-dark: #00877C; /* Hijau gelap untuk judul promo */
        }
        
        body {
            background-color: var(--bg-light);
            font-family: 'Inter', sans-serif;
        }

        /* NAVBAR Sederhana */
        .navbar {
            background: white;
            border-bottom: 1px solid #eef1f6; 
        }
        
        /* LOGO BARU */
        .navbar-brand {
            color: var(--promo-dark) !important; /* Warna logo lebih gelap */
            font-weight: 700;
        }

        /* HERO SECTION KEREN (Split Background & Shadow) */
        .hero-section {
            /* Split Background Gradient: Kiri Putih, Kanan Gradient */
            background: #ffffff;
            background-image: linear-gradient(to right, #ffffff 60%, #e0f2f1 100%); 
            border-radius: 20px;
            padding: 60px 50px; /* Padding ditingkatkan */
            color: #1a202c;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); /* Shadow lebih premium */
            position: relative;
            overflow: hidden;
        }
        
        .hero-section h1 {
            color: var(--promo-dark); /* Judul menggunakan warna gelap yang elegan */
            /* Teks lebih besar dan berani */
            font-size: 2.5rem; 
        }
        
        .hero-section p {
            max-width: 80%;
        }

        /* Button Promo */
        .btn-promo {
            background-color: var(--primary-color);
            color: white !important;
            border: none;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(32, 201, 151, 0.4);
        }

        .btn-promo:hover {
            background-color: #1aa67e;
            transform: translateY(-1px);
        }
        
        /* Ikon Dekorasi Keren di Hero Section */
        .hero-icon-decor {
            font-size: 10rem;
            color: var(--promo-dark);
            opacity: 0.5; 
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            /* Animasi ringan untuk efek lebih hidup */
            animation: pulse 2s infinite alternate; 
        }

        @keyframes pulse {
            from { opacity: 0.3; }
            to { opacity: 0.5; }
        }

        /* PRODUCT CARD Ramping (Tidak Berubah, Sudah Minimalis) */
        .product-card {
            border: 1px solid #eef1f6; 
            border-radius: 12px;
            transition: all 0.2s;
            overflow: hidden;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03); 
        }

        .product-card:hover {
            transform: translateY(-2px); 
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.06);
        }

        .product-card .img-placeholder {
            background: #f0f2f5; 
            height: 200px;
            border-bottom: 1px solid #eef1f6;
        }

        .btn-cart {
            background-color: var(--primary-color); 
            color: white;
            border: none;
            border-radius: 10px; 
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
        }

        .btn-cart:hover {
            background-color: #1aa67e;
            transform: scale(1.05);
        }
        
        .price-text {
            color: #1a202c;
            font-size: 1.1rem;
            font-weight: 700;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fs-4" href="#"><i class="bi bi-send-fill me-2"></i>Movr</a>

            <div class="d-flex align-items-center gap-3">
                <a href="#" class="btn btn-light position-relative rounded-pill p-2 text-dark">
                    <i class="bi bi-cart fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">2</span>
                </a>
                
                <div class="dropdown">
                    <a class="btn btn-sm btn-outline-secondary dropdown-toggle rounded-pill px-3" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person me-1"></i> {{ Auth::guard('pembeli')->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-gear me-2"></i> Profil & Pengaturan</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-seam me-2"></i> Pesanan Saya</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="hero-section mb-5">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="fw-bolder mb-3">DISKON Kilat Hari Ini! ⚡</h1>
                    <p class="fs-5 mb-4 text-muted">Dapatkan **diskon hingga 50%** untuk produk pilihan. Klik tombol di bawah sebelum waktu habis!</p>
                    <button class="btn btn-promo fw-bold px-4 py-2 rounded-pill">Cek Promo Sekarang!</button>
                </div>
                <div class="col-md-4 text-end d-none d-md-block">
                    <i class="bi bi-tags-fill hero-icon-decor"></i>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h4 class="fw-bold mb-0 text-dark">Rekomendasi Untukmu</h4>
            <a href="#" class="text-decoration-none fw-bold" style="color: var(--primary-color);">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            <div class="col-6 col-md-3">
                <div class="product-card h-100">
                    <div class="img-placeholder d-flex align-items-center justify-content-center">
                        <i class="bi bi-laptop fs-1 text-secondary opacity-50"></i>
                    </div>
                    <div class="card-body p-3">
                        <small class="text-muted">Fashion</small>
                        <h6 class="fw-bold text-truncate my-1">Hi-Tech shirt</h6>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price-text">Rp 220.000</span>
                            <button class="btn-cart"><i class="bi bi-plus-lg"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="product-card h-100">
                    <div class="img-placeholder d-flex align-items-center justify-content-center">
                        <i class="bi bi-phone fs-1 text-secondary opacity-50"></i>
                    </div>
                    <div class="card-body p-3">
                        <small class="text-muted">fashion</small>
                        <h6 class="fw-bold text-truncate my-1">Compression Shorts</h6>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price-text">Rp 1.000.000</span>
                            <button class="btn-cart"><i class="bi bi-plus-lg"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="product-card h-100">
                    <div class="img-placeholder d-flex align-items-center justify-content-center">
                        <i class="bi bi-headphones fs-1 text-secondary opacity-50"></i>
                    </div>
                    <div class="card-body p-3">
                        <small class="text-muted">Aksesoris</small>
                        <h6 class="fw-bold text-truncate my-1">Caps M</h6>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price-text">Rp 150.000</span>
                            <button class="btn-cart"><i class="bi bi-plus-lg"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="product-card h-100">
                    <div class="img-placeholder d-flex align-items-center justify-content-center">
                        <i class="bi bi-watch fs-1 text-secondary opacity-50"></i>
                    </div>
                    <div class="card-body p-3">
                        <small class="text-muted">Fashion</small>
                        <h6 class="fw-bold text-truncate my-1">Smartwatch Keren</h6>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price-text">Rp 750.000</span>
                            <button class="btn-cart"><i class="bi bi-plus-lg"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>