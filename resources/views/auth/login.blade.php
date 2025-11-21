<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Sistem</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        :root {
            /* Perubahan: Warna Akses Utama diubah menjadi HIJAU TOSCA */
            --primary-color: #00A89A; 
            /* Warna latar belakang lembut */
            --bg-light: #f4f7f6;
            /* Shadow yang lembut untuk Neumorphism ringan */
            --soft-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--bg-light); /* Latar belakang solid yang lembut */
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        /* Card yang Sederhana dan Bersih */
        .simple-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--soft-shadow); /* Shadow lembut */
            padding: 40px;
            width: 100%;
            max-width: 380px; 
            text-align: center;
            /* Animasi Masuk */
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            margin-bottom: 30px;
        }
        
        /* Icon minimalis */
        .login-header i {
            font-size: 2.5rem;
            color: var(--primary-color); 
            margin-bottom: 10px;
        }

        /* Input Styling Minimalis */
        .input-group {
            margin-bottom: 20px !important;
        }
        
        .input-group-text {
            background: #f0f2f5; 
            border: none;
            color: #777;
            border-radius: 12px 0 0 12px !important;
            padding: 12px 15px;
        }

        .form-control {
            background: #f0f2f5;
            border: 1px solid #e0e2e5; 
            color: #333 !important;
            padding: 12px 15px;
            border-radius: 0 12px 12px 0 !important;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            background: white;
            border-color: var(--primary-color); 
            box-shadow: none;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        /* Button Styling Sederhana */
        .btn-primary-simple {
            background-color: var(--primary-color);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            /* Perubahan: Shadow disesuaikan dengan warna tosca */
            box-shadow: 0 4px 15px rgba(0, 168, 154, 0.3);
        }

        .btn-primary-simple:hover {
            background-color: #00877C; /* Warna tosca sedikit lebih gelap saat hover */
            transform: translateY(-2px);
            /* Perubahan: Shadow disesuaikan dengan warna tosca */
            box-shadow: 0 6px 20px rgba(0, 168, 154, 0.4);
        }

        /* Alert styling yang lebih lembut */
        .alert-soft {
            background-color: #fcebeb; 
            border: 1px solid #f9d8d8;
            color: #d9534f;
            border-radius: 12px;
            font-size: 0.9rem;
            text-align: left;
        }

        .footer-text {
            margin-top: 30px;
            text-align: center;
            font-size: 0.75rem;
            color: #888;
        }
    </style>
</head>

<body>

    <div class="simple-card">
        <div class="login-header">
            <i class="bi bi-person-circle d-inline-block"></i> 
            <h2 class="fw-bold text-dark">Masuk Akun</h2>
            <p class="small text-muted">Akses ke Sistem Multi-Role</p>
        </div>

        @if($errors->any())
        <div class="alert alert-soft d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div>{{ $errors->first() }}</div>
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>

            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-primary-simple w-100 mt-3">
                MASUK <i class="bi bi-box-arrow-in-right ms-2"></i>
            </button>
        </form>

        <div class="footer-text">
            Sistem Login Multi-Role (Admin • Penjual • Pembeli)<br>
            &copy; 2025
        </div>
    </div>

</body>

</html>