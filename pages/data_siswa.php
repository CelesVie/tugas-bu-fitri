<?php
// Halaman daftar data siswa (Read)
session_start();
// Cek login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=Silakan login dulu!');
    exit;
}
// Cek role guru
$role = $_SESSION['role'];
if ($role !== 'guru') {
    header('Location: dashboard.php?error=Anda tidak memiliki akses ke halaman ini!');
    exit;
}
// Koneksi database
require_once('../config/db.php');
// Query ambil data siswa
$result = $conn->query('SELECT * FROM data_siswa ORDER BY id DESC');
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
    <title>Data Siswa</title>
    <!-- Title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- CSS custom -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Font -->
</head>
<body>
    <!-- Body -->
    <nav class="navbar navbar-light bg-white shadow-sm mb-4" style="border-radius:0 0 18px 18px;">
        <!-- Navbar -->
        <div class="container justify-content-between">
            <!-- Container -->
            <span class="navbar-brand mb-0 h1" style="font-weight:600;letter-spacing:-1px;">Database</span>
            <!-- Brand -->
            <a href="dashboard.php" class="btn btn-outline-primary" style="border-radius:14px;">Dashboard</a>
            <!-- Link dashboard -->
        </div>
    </nav>
    <div class="container shadow-sm">
        <!-- Container utama -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Flex header -->
            <h2 class="mb-0">Data Siswa</h2>
            <!-- Judul -->
            <a href="tambah_siswa.php" class="btn btn-primary" style="min-width:140px;">+ Tambah Siswa</a>
            <!-- Tombol tambah -->
        </div>
        <div class="table-responsive">
            <!-- Table responsive -->
            <table class="table table-hover align-middle"
                style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 2px 12px rgba(60,60,60,0.06);">
                <!-- Table -->
                <thead class="table-light">
                    <!-- Header table -->
                    <tr style="vertical-align:middle;">
                        <!-- Row header -->
                        <th style="width:40px;">No</th>
                        <!-- Kolom No -->
                        <th>Nama</th>
                        <!-- Kolom Nama -->
                        <th>NIS</th>
                        <!-- Kolom NIS -->
                        <th>Kelas</th>
                        <!-- Kolom Kelas -->
                        <th>Alamat</th>
                        <!-- Kolom Alamat -->
                        <th style="width:120px;">Aksi</th>
                        <!-- Kolom Aksi -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Body table -->
                    <?php $no = 1;
                    while ($row = $result->fetch_assoc()): ?>
                        <!-- Loop data -->
                        <tr>
                            <!-- Row data -->
                            <td><?= $no++ ?></td>
                            <!-- No urut -->
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <!-- Nama -->
                            <td><?= htmlspecialchars($row['nis']) ?></td>
                            <!-- NIS -->
                            <td><?= htmlspecialchars($row['kelas']) ?></td>
                            <!-- Kelas -->
                            <td><?= htmlspecialchars($row['alamat']) ?></td>
                            <!-- Alamat -->
                            <td>
                                <!-- Aksi -->
                                <a href="edit_siswa.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning me-1"
                                    style="border-radius:10px;min-width:56px;">Edit</a>
                                <!-- Tombol edit -->
                                <a href="hapus_siswa.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                                    style="border-radius:10px;min-width:56px;"
                                    onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                                <!-- Tombol hapus -->
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    <!-- Script -->
    window.addEventListener('DOMContentLoaded', function () {
        // Tunggu load
        document.querySelectorAll('.container').forEach(function (el) {
            // Untuk container
            el.style.opacity = 1;
            // Opacity 1
            el.style.transform = 'none';
            // Transform none
        });
    });
</script>
</html>
