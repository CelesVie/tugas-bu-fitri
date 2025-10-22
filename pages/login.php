<?php
// Ini adalah bagian PHP di atas, biasanya untuk logika server-side
// Tapi di sini cuma komentar aja, nggak ada kode PHP yang aktif
/*
Form login guru/siswa, Apple style, Bootstrap 5
*/
?>
<!DOCTYPE html>
<!-- Ini adalah deklarasi HTML5, standar untuk halaman web modern -->
<html lang="id">
<!-- Tag html dengan bahasa Indonesia -->
<head>
    <!-- Bagian head berisi informasi tentang halaman, seperti judul dan link ke CSS/JS -->
    <meta charset="UTF-8">
    <!-- Meta charset untuk mendukung karakter Unicode, termasuk bahasa Indonesia -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta viewport agar halaman responsif di perangkat mobile -->
    <title>Login Akun | SMKN 5 Tangerang</title>
    <!-- Judul halaman yang muncul di tab browser -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link ke Bootstrap CSS dari CDN, untuk styling yang cantik dan mudah -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Link ke file CSS custom kita sendiri -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Link ke font Poppins dari Google Fonts, biar tulisan lebih keren -->
</head>
<body>
    <!-- Bagian body adalah isi utama halaman yang terlihat di browser -->
    <nav class="navbar navbar-expand-lg bg-white mb-4" style="box-shadow:0 4px 24px rgba(60,60,60,0.07);border-radius:0 0 22px 22px;transition:box-shadow 0.3s cubic-bezier(.77,0,.18,1);">
        <!-- Navbar adalah bilah navigasi di atas, menggunakan Bootstrap -->
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center" style="min-height:62px;">
            <!-- Container fluid agar navbar memenuhi lebar layar -->
            <div class="navbar-brand mb-0 h1 d-flex align-items-center" style="font-weight:600;letter-spacing:-1px;font-size:1.25rem;transition:color 0.2s;">
                <!-- Brand dengan logo -->
                <img src="../assets/images/smkn5logo.png" alt="Logo Sekolah" class="logo">
                <!-- Logo -->
                SMKN 5 Tangerang
                <!-- Nama sekolah -->
            </div>
        </div>
    </nav>
    <div class="container shadow-sm">
        <!-- Container utama untuk form login, dengan shadow biar kelihatan elegan -->
        <h2 class="text-center mb-4">Login Akun</h2>
        <!-- Judul halaman, rata tengah -->
        <?php if (isset($_GET['error'])): ?>
            <!-- Jika ada parameter error di URL, tampilkan pesan error -->
            <div class="alert alert-danger shadow-sm fade show" role="alert">
                <!-- Alert merah untuk error -->
                <?= htmlspecialchars($_GET['error']) ?>
                <!-- Tampilkan pesan error dengan aman (mencegah XSS) -->
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['success'])): ?>
            <!-- Jika ada parameter success di URL, tampilkan pesan sukses -->
            <div class="alert alert-success shadow-sm fade show" role="alert">
                <!-- Alert hijau untuk sukses -->
                <?= htmlspecialchars($_GET['success']) ?>
                <!-- Tampilkan pesan sukses -->
            </div>
        <?php endif; ?>
        <form action="process_login.php" method="POST" autocomplete="off" novalidate>
            <!-- Form untuk login, kirim data ke process_login.php -->
            <div class="mb-3">
                <!-- Div untuk input email -->
                <label for="email" class="form-label">Email</label>
                <!-- Label untuk input email -->
                <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                <!-- Input email, wajib diisi, maksimal 50 karakter -->
            </div>
            <div class="mb-3">
                <!-- Div untuk input password -->
                <label for="password" class="form-label">Password</label>
                <!-- Label untuk input password -->
                <input type="password" class="form-control" id="password" name="password" required minlength="8">
                <!-- Input password, wajib diisi, minimal 8 karakter -->
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
            <!-- Tombol submit untuk login, lebar penuh -->
        </form>
        <div class="text-center mt-4" style="color:#888;font-size:0.95em;">Belum punya akun? <a href="register.php" style="color:#222;text-decoration:underline;">Daftar</a></div>
        <!-- Teks untuk link ke halaman register -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script Bootstrap JS dari CDN, untuk interaktivitas -->
    <script>
    // Script JavaScript untuk animasi alert
    window.addEventListener('DOMContentLoaded', function() {
        // Tunggu sampai halaman selesai load
        document.querySelectorAll('.alert').forEach(function(el) {
            // Untuk setiap elemen alert
            el.style.opacity = 1;
            // Set opacity jadi 1 (tampak)
            el.style.transform = 'none';
            // Hapus transformasi (biar nggak geser)
        });
    });
    </script>
</body>
</html>
