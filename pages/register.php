<?php
// Form registrasi guru & siswa, Apple style, Bootstrap 5
/*
Form registrasi guru & siswa, Apple style, Bootstrap 5
*/
?>
<!DOCTYPE html>
<!-- HTML5 -->
<html lang="id">
<!-- Bahasa ID -->
<head>
    <!-- Head -->
    <meta charset="UTF-8">
    <!-- Charset -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Viewport -->
    <title>Registrasi Akun | SMKN 5 Tangerang</title>
    <!-- Title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- CSS custom -->
    <!-- Poppins font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Font -->
</head>
<body>
    <!-- Body -->
    <nav class="navbar navbar-expand-lg bg-white mb-4" style="box-shadow:0 4px 24px rgba(60,60,60,0.07);border-radius:0 0 22px 22px;transition:box-shadow 0.3s cubic-bezier(.77,0,.18,1);">
        <!-- Navbar -->
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center" style="min-height:62px;">
            <!-- Container -->
            <div class="navbar-brand mb-0 h1 d-flex align-items-center" style="font-weight:600;letter-spacing:-1px;font-size:1.25rem;transition:color 0.2s;">
                <!-- Brand dengan logo -->
                <img src="../assets/images/smkn5logo.png" alt="Logo Sekolah" class="logo">
                <!-- Logo -->
                SMKN 5 Tangerang
                <!-- Nama sekolah -->
            </div>
            <div class="d-flex align-items-center gap-2">
                <!-- Div untuk link login -->
                <span style="color:#888;font-size:1rem;font-weight:500;letter-spacing:0.2px;">Sudah punya akun?</span>
                <!-- Teks -->
                <a href="login.php" class="btn btn-outline-primary" style="border-radius:16px;padding:7px 22px;font-weight:500;box-shadow:0 2px 8px rgba(60,60,60,0.06);transition:box-shadow 0.2s,background 0.2s,transform 0.2s;">Login</a>
                <!-- Tombol login -->
            </div>
        </div>
    </nav>
    <div class="container shadow-sm">
        <!-- Container utama -->
        <h2 class="text-center mb-4">Registrasi Akun</h2>
        <!-- Judul -->
        <?php if (isset($_GET['error'])): ?>
            <!-- Jika error -->
            <div class="alert alert-danger shadow-sm fade show" role="alert">
                <!-- Alert error -->
                <?= htmlspecialchars($_GET['error']) ?>
                <!-- Pesan error -->
            </div>
        <?php endif; ?>
        <form action="process_register.php" method="POST" autocomplete="off" novalidate>
            <!-- Form registrasi -->
            <div class="mb-3">
                <!-- Div nama -->
                <label for="nama" class="form-label">Nama Lengkap</label>
                <!-- Label nama -->
                <input type="text" class="form-control" id="nama" name="nama" required maxlength="50">
                <!-- Input nama -->
            </div>
            <div class="mb-3">
                <!-- Div email -->
                <label for="email" class="form-label">Email</label>
                <!-- Label email -->
                <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                <!-- Input email -->
            </div>
            <div class="mb-3">
                <!-- Div password -->
                <label for="password" class="form-label">Password</label>
                <!-- Label password -->
                <input type="password" class="form-control" id="password" name="password" required minlength="8">
                <!-- Input password -->
                <div class="form-text">Minimal 8 karakter</div>
                <!-- Hint -->
            </div>
            <div class="mb-3">
                <!-- Div role -->
                <label for="role" class="form-label">Daftar Sebagai</label>
                <!-- Label role -->
                <select class="form-select" id="role" name="role" required>
                    <!-- Select role -->
                    <option value="">Pilih peran...</option>
                    <!-- Option kosong -->
                    <option value="guru">Guru</option>
                    <!-- Option guru -->
                    <option value="siswa">Siswa</option>
                    <!-- Option siswa -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-2">Daftar</button>
            <!-- Tombol daftar -->
        </form>
        <div class="text-center mt-4" style="color:#888;font-size:0.95em;">Sudah punya akun? <a href="login.php" style="color:#222;text-decoration:underline;">Login</a></div>
        <!-- Link ke login -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS -->
    <script>
    // Validasi front-end tambahan
    document.querySelector('form').addEventListener('submit', function(e) {
        // Event listener submit
        var pass = document.getElementById('password').value;
        // Ambil value password
        if (pass.length < 8) {
            // Jika kurang dari 8
            alert('Password minimal 8 karakter!');
            // Alert
            e.preventDefault();
            // Prevent submit
        }
    });
    // Fluid fade-in untuk alert jika ada
    window.addEventListener('DOMContentLoaded', function() {
        // Tunggu load
        document.querySelectorAll('.alert').forEach(function(el) {
            // Untuk alert
            el.style.opacity = 1;
            // Opacity 1
            el.style.transform = 'none';
            // Transform none
        });
    });
    </script>
</body>
</html>
