<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            /* Warna Akses Utama: Biru gelap modern */
            --primary-color: #3f51b5; 
            /* Warna latar belakang lembut */
            --bg-light: #f7f9fc;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Inter', sans-serif;
            color: #333;
        }

        /* SIDEBAR TERANG DAN RAMPING */
        .sidebar {
            background: white; /* Sidebar terang */
            min-height: 100vh;
            color: #333;
            border-right: 1px solid #eee;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.03);
            transition: all 0.3s;
        }

        .sidebar .nav-link {
            color: #6c757d;
            padding: 15px 20px;
            margin-bottom: 5px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: var(--primary-color); /* Warna aksen utama */
            background: #eef1f6;
            border-radius: 10px;
            font-weight: 600;
        }

        .sidebar .nav-link.active {
             border-left: 4px solid var(--primary-color);
        }

        /* KARTU STATISTIK BERSIH (Outline/Minimalis) */
        .stat-card {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
            overflow: hidden;
            position: relative;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .stat-card .card-icon {
            color: var(--primary-color); /* Warna ikon diseragamkan */
            font-size: 2.5rem;
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .stat-card.bg-primary .card-icon { color: #007bff; }
        .stat-card.bg-success .card-icon { color: #198754; }
        .stat-card.bg-warning .card-icon { color: #ffc107; }

        /* Style untuk Tabel */
        .table thead th {
            border-bottom: 2px solid #e9ecef;
            font-weight: 600;
            color: #6c757d;
            background-color: #f8f9fa;
        }
        
        /* Logout Button di Sidebar */
        .btn-logout {
            background-color: #f44336;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        .btn-logout:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <div class="sidebar p-4 d-none d-md-block" style="width: 260px;"> <h5 class="mb-5 fw-bold text-dark border-bottom pb-3"><i class="bi bi-gear-fill me-2 text-muted"></i>Fardhan Panel</h5>
            <nav class="nav flex-column">
                <a class="nav-link active py-3 px-3" href="#"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                <a class="nav-link py-3 px-3" href="#"><i class="bi bi-box-seam me-2"></i> Kelola Produk</a>
                <a class="nav-link py-3 px-3" href="#"><i class="bi bi-people me-2"></i> Kelola User</a>
                
                <div class="mt-5 pt-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-logout w-100 text-white"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                    </form>
                </div>
            </nav>
        </div>

        <div class="flex-grow-1 p-5"> <div class="container-fluid">
                <div class="d-md-none d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h4 class="fw-bold text-dark">Fardhan Panel</h4>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf <button class="btn btn-sm btn-logout text-white">Logout</button>
                    </form>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h1 class="fw-bold text-dark mb-0">Dashboard Overview</h1> <p class="text-muted mt-1">Status dan Statistik Sistem. Selamat datang, <strong>{{ Auth::guard('admin')->user()->name }}</strong>!</p>
                    </div>
                    <span class="badge rounded-pill text-bg-primary p-3 fw-normal">Administrator</span>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card stat-card bg-primary">
                            <div class="card-body p-4">
                                <div class="card-icon"><i class="bi bi-box-seam"></i></div>
                                <h6 class="text-uppercase text-muted mb-1">Total Produk</h6>
                                <h2 class="fw-bold mb-0 text-dark">124</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stat-card bg-success">
                            <div class="card-body p-4">
                                <div class="card-icon"><i class="bi bi-shop"></i></div>
                                <h6 class="text-uppercase text-muted mb-1">Total Penjual</h6>
                                <h2 class="fw-bold mb-0 text-dark">45</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stat-card bg-warning">
                            <div class="card-body p-4">
                                <div class="card-icon"><i class="bi bi-exclamation-circle"></i></div>
                                <h6 class="text-uppercase text-muted mb-1">Perlu Review</h6>
                                <h2 class="fw-bold mb-0 text-dark">12</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-lg rounded-4"> <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h4 class="fw-bold text-dark mb-0">Aktivitas Terbaru</h4> </div>
                    <div class="card-body p-4">
                        <table class="table table-striped table-borderless align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>User</th>
                                    <th>Aktivitas</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fardhan Ganteng Penjual</td>
                                    <td>Menambahkan Produk Baru</td>
                                    <td>Baru Saja</td>
                                    <td><span class="badge bg-success py-2 px-3 fw-normal">Sukses</span></td>
                                </tr>
                                <tr>
                                    <td>Raihan Pembeli</td>
                                    <td>Melakukan Checkout</td>
                                    <td>5 Menit lalu</td>
                                    <td><span class="badge bg-warning text-dark py-2 px-3 fw-normal">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>{{ Auth::guard('admin')->user()->name }}</td>
                                    <td>Login ke Sistem</td>
                                    <td>10 Menit lalu</td>
                                    <td><span class="badge bg-info text-dark py-2 px-3 fw-normal">Info</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>