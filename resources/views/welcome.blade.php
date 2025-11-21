<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .navbar-brand {
            font-weight: 700;
            color: #6610f2 !important;
        }

        .card-action {
            border: 2px dashed #6610f2;
            background: rgba(102, 16, 242, 0.05);
            cursor: pointer;
            transition: 0.3s;
        }

        .card-action:hover {
            background: rgba(102, 16, 242, 0.1);
        }

        .product-img {
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-shop-window me-2"></i>SellerCentre</a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted d-none d-md-block">Halo, <strong>{{ Auth::guard('penjual')->user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm rounded-pill px-4">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="p-5 mb-4 bg-light rounded-3 shadow-sm" style="background: linear-gradient(135deg, #6610f2 0%, #a06ee1 100%); color: white;">
            <div class="container-fluid py-3">
                <h1 class="display-5 fw-bold">Siap Jualan Hari Ini?</h1>
                <p class="col-md-8 fs-5">Pantau produkmu, cek pesanan masuk, dan tambah stok barang dengan mudah.</p>
                <button class="btn btn-light text-primary fw-bold btn-lg" type="button">Lihat Pesanan</button>
            </div>
        </div>

        <h4 class="fw-bold mb-4 text-dark border-start border-4 border-primary ps-3">Kelola Produk</h4>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 card-action d-flex justify-content-center align-items-center text-center p-4" onclick="window.location.href='/penjual/produk/create'">
                    <div>
                        <div class="display-4 text-primary mb-2"><i class="bi bi-plus-circle"></i></div>
                        <h6 class="fw-bold text-primary">Tambah Produk Baru</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <div class="bg-secondary bg-opacity-10 rounded mb-3 d-flex align-items-center justify-content-center product-img">
                            <i class="bi bi-image fs-1 text-muted"></i>
                        </div>
                        <h6 class="fw-bold">Kopi Robusta</h6>
                        <p class="text-muted small mb-2">Stok: 50 Pcs</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">Rp 45.000</span>
                            <button class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <div class="bg-secondary bg-opacity-10 rounded mb-3 d-flex align-items-center justify-content-center product-img">
                            <i class="bi bi-image fs-1 text-muted"></i>
                        </div>
                        <h6 class="fw-bold">Teh Melati</h6>
                        <p class="text-muted small mb-2">Stok: 100 Pcs</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">Rp 15.000</span>
                            <button class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>