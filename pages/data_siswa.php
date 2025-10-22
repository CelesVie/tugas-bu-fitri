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
    <style>
        body {
            background-color: #f5f5f7;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .hover-row:hover {
            background-color: #f8f8f8;
        }
        .btn-apple {
            border-radius: 18px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: all 0.25s ease;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border: none;
        }
        .btn-apple:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-blue {
            background-color: #0071e3;
            color: white;
        }
        .btn-blue:hover {
            background-color: #0a84ff;
        }
        .btn-green {
            background-color: #34c759;
            color: white;
        }
        .btn-green:hover {
            background-color: #30d158;
        }
        .btn-red {
            background-color: #ff3b30;
            color: white;
        }
        .btn-red:hover {
            background-color: #ff453a;
        }
    </style>
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
    <div class="container">
        <!-- Container utama -->
        <div class="card shadow-sm" style="border-radius: 16px; border: none;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Flex header -->
                    <h2 class="mb-0">Data Siswa</h2>
                    <!-- Judul -->
                    <a href="tambah_siswa.php" class="btn btn-apple btn-blue px-3 py-2" style="min-width:140px;">+ Tambah Siswa</a>
                    <!-- Tombol tambah -->
                </div>
                <div class="table-responsive">
                    <!-- Table responsive -->
                    <table class="table align-middle" style="border: none;">
                        <!-- Table -->
                        <thead style="border-bottom: 1px solid #e0e0e0;">
                            <!-- Header table -->
                            <tr style="vertical-align:middle;">
                                <!-- Row header -->
                                <th style="width:40px; border: none;">No</th>
                                <!-- Kolom No -->
                                <th style="border: none;">Nama</th>
                                <!-- Kolom Nama -->
                                <th style="border: none;">NIS</th>
                                <!-- Kolom NIS -->
                                <th style="border: none;">Kelas</th>
                                <!-- Kolom Kelas -->
                                <th style="border: none;">Alamat</th>
                                <!-- Kolom Alamat -->
                                <th style="width:120px; border: none;">Aksi</th>
                                <!-- Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Body table -->
                            <?php $no = 1;
                            while ($row = $result->fetch_assoc()): ?>
                                <!-- Loop data -->
                                <tr style="border: none;" class="hover-row">
                                    <!-- Row data -->
                                    <td style="border: none;"><?= $no++ ?></td>
                                    <!-- No urut -->
                                    <td style="border: none;"><?= htmlspecialchars($row['nama']) ?></td>
                                    <!-- Nama -->
                                    <td style="border: none;"><?= htmlspecialchars($row['nis']) ?></td>
                                    <!-- NIS -->
                                    <td style="border: none;"><?= htmlspecialchars($row['kelas']) ?></td>
                                    <!-- Kelas -->
                                    <td style="border: none;"><?= htmlspecialchars($row['alamat']) ?></td>
                                    <!-- Alamat -->
                                    <td style="border: none;">
                                        <!-- Aksi -->
                                        <div class="d-flex gap-2">
                                            <a href="edit_siswa.php?id=<?= $row['id'] ?>" class="btn btn-apple btn-green px-3 py-1">Edit</a>
                                            <!-- Tombol edit -->
                                            <a href="hapus_siswa.php?id=<?= $row['id'] ?>" class="btn btn-apple btn-red px-3 py-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                                            <!-- Tombol hapus -->
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
            </table>
        </div>
            </div>
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
