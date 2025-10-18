<?php
// Mulai session untuk menyimpan data login user
session_start();
// Cek apakah user sudah login, kalau belum redirect ke login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=Silakan login dulu!'); exit;
}
// Ambil nama dan role dari session
$nama = $_SESSION['nama'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<!-- Deklarasi HTML5 -->
<html lang="id">
<!-- Bahasa Indonesia -->
<head>
    <!-- Bagian head untuk info halaman -->
    <meta charset="UTF-8">
    <!-- Charset untuk Unicode -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Viewport untuk responsif -->
    <title>Dashboard</title>
    <!-- Judul halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS dari CDN -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- CSS custom -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Font Poppins -->
</head>
<body>
    <!-- Body halaman -->
    <nav class="navbar navbar-light bg-white shadow-sm mb-4" style="border-radius:0 0 18px 18px;">
        <!-- Navbar dengan shadow dan border radius -->
        <div class="container justify-content-between">
            <!-- Container dengan justify between -->
            <div class="navbar-brand mb-0 h1 d-flex align-items-center" style="font-weight:600;letter-spacing:-1px;">
                <!-- Brand dengan logo dan nama sekolah -->
                <img src="../assets/images/smkn5logo.png" alt="Logo Sekolah" class="logo" style="height:40px; margin-right:10px;">
                <!-- Logo sekolah -->
                SMKN 5 Tangerang
                <!-- Nama sekolah -->
            </div>
            <a href="logout.php" class="btn btn-outline-primary" style="border-radius:14px;">Logout</a>
            <!-- Tombol logout -->
        </div>
    </nav>
    <div class="container shadow-sm" style="max-width:440px;">
        <!-- Container utama dengan max width -->
        <h2 class="mb-2 text-center">Selamat datang, <span style="font-weight:600;"><?= htmlspecialchars($nama) ?></span>!</h2>
        <!-- Salam dengan nama user -->
        <p class="mb-4 text-center" style="color:#666;">Anda login sebagai <b><?= htmlspecialchars($role) ?></b>.</p>
        <!-- Info role user -->
        <div class="d-grid gap-3 mb-3">
            <!-- Grid untuk tombol -->
            <?php if ($role === 'guru'): ?>
                <!-- Jika role guru, tampilkan tombol kelola siswa -->
                <a href="data_siswa.php" class="btn btn-primary btn-lg" style="border-radius:16px;">Kelola Data Siswa</a>
                <!-- Link ke halaman data siswa -->
            <?php else: ?>
                <!-- Jika bukan guru, tampilkan pesan tidak ada akses -->
                <p class="text-center" style="color:#666;">Anda tidak memiliki akses untuk mengelola data siswa.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
<script>
<!-- Script JS untuk animasi -->
window.addEventListener('DOMContentLoaded', function() {
    // Tunggu halaman load
    document.querySelectorAll('.container').forEach(function(el) {
        // Untuk setiap container
        el.style.opacity = 1;
        // Set opacity 1
        el.style.transform = 'none';
        // Hapus transform
    });
});
</script>
</html>
