<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            /* Perubahan: Warna Akses Penjual diubah menjadi Hijau Tosca */
            --seller-accent: #20c997; 
            --tosca-dark: #00877C; /* Tosca lebih gelap untuk judul/brand */
            --bg-light: #f7f9fc; 
            --dark-text: #1a202c;
        }
        
        body {
            background-color: var(--bg-light);
            font-family: 'Inter', sans-serif;
        }

        /* NAVBAR Sederhana */
        .navbar {
            background: white;
            border-bottom: 1px solid #eef1f6; 
            box-shadow: none !important;
        }

        .navbar-brand {
            font-weight: 700;
            /* Menggunakan tosca gelap untuk brand */
            color: var(--tosca-dark) !important;
        }

        /* HERO SECTION Sederhana & Modern */
        .hero-section {
            background: #ffffff;
            /* Perubahan: Gradient diubah ke Tosca */
            background-image: linear-gradient(to right, #ffffff 70%, rgba(32, 201, 151, 0.05) 100%); 
            border-radius: 20px;
            padding: 50px 40px;
            color: var(--dark-text);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .hero-section h1 {
            /* Menggunakan tosca gelap untuk judul */
            color: var(--tosca-dark);
        }

        .hero-section .btn-light {
            background-color: var(--seller-accent);
            color: white !important;
            border: none;
            transition: 0.3s;
            font-weight: 600;
            /* Perubahan: Shadow diubah ke Tosca */
            box-shadow: 0 4px 15px rgba(32, 201, 151, 0.3);
        }

        .hero-section .btn-light:hover {
            /* Perubahan: Hover diubah ke Tosca gelap */
            background-color: #1aa67e;
            transform: translateY(-1px);
        }

        /* KARTU AKSI (Action Card) */
        .card-action {
            /* Border menggunakan Tosca */
            border: 2px solid var(--seller-accent);
            background: white; 
            cursor: pointer;
            transition: 0.3s;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
            border-style: dashed;
        }

        .card-action:hover {
            /* Perubahan: Hover background diubah ke Tosca */
            background: rgba(32, 201, 151, 0.05);
        }

        .card-action .display-4 {
            /* Ikon menggunakan Tosca */
            color: var(--seller-accent) !important;
        }
        
        /* PRODUCT CARD Ramping */
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

        .product-img {
            height: 150px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        
        .product-card .btn-light {
             /* Tombol Edit menggunakan Tosca */
            color: var(--seller-accent) !important;
            background: #f0f2f5; 
            transition: background 0.2s;
        }

        .product-card .btn-light:hover {
            background: #e0e2e5;
        }
        
        /* Judul Section */
        .section-title {
            /* Border dan teks menggunakan Tosca */
            color: var(--tosca-dark);
            border-color: var(--seller-accent) !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fs-4" href="#"><i class="bi bi-shop me-2"></i>SellerMovr</a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted d-none d-md-block">Halo, <strong>{{ Auth::guard('penjual')->user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger rounded-pill px-3 py-1 fw-bold"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="hero-section mb-5">
            <div class="container-fluid py-3">
                <h1 class="display-5 fw-bold">Siap Jualan Hari Ini?</h1>
                <p class="col-md-8 fs-5 text-muted">Pantau produkmu, cek pesanan masuk, dan tambah stok barang dengan mudah dari panel ini.</p>
                <button class="btn btn-light fw-bold btn-lg rounded-pill" type="button">Lihat Pesanan Masuk</button>
            </div>
            <i class="bi bi-check2-circle text-secondary position-absolute end-0 me-5 top-50 translate-middle-y" style="font-size: 8rem; opacity: 0.15;"></i>
        </div>
        <h4 class="fw-bold mb-4 text-dark border-start border-4 ps-3 section-title">Kelola Produk</h4>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 card-action d-flex justify-content-center align-items-center text-center p-4" onclick="window.location.href='/penjual/produk/create'">
                    <div>
                        <div class="display-4 mb-2"><i class="bi bi-plus-circle"></i></div>
                        <h6 class="fw-bold text-dark">Tambah Produk Baru</h6>
                        <p class="small text-muted mb-0">Klik untuk memulai</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 product-card">
                    <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center product-img">
                         <i class="bi bi-cup-hot fs-1 text-muted"></i>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="fw-bold text-truncate">Hi-Tech shirt</h6>
                        <p class="text-muted small mb-2">Stok: <span class="fw-bold text-success">50 Pcs</span></p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold text-dark">Rp 220.000</span>
                            <button class="btn btn-sm btn-light rounded-pill"><i class="bi bi-pencil"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 product-card">
                    <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center product-img">
                         <i class="bi bi-flower1 fs-1 text-muted"></i>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="fw-bold text-truncate">Compression Shorts</h6>
                        <p class="text-muted small mb-2">Stok: <span class="fw-bold text-success">100 Pcs</span></p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold text-dark">Rp 1.000.000</span>
                            <button class="btn btn-sm btn-light rounded-pill"><i class="bi bi-pencil"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card h-100 product-card">
                    <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center product-img">
                         <i class="bi bi-bag fs-1 text-muted"></i>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="fw-bold text-truncate">Caps M</h6>
                        <p class="text-muted small mb-2">Stok: <span class="fw-bold text-danger">5 Pcs</span></p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold text-dark">Rp 150.000</span>
                            <button class="btn btn-sm btn-light rounded-pill"><i class="bi bi-pencil"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>