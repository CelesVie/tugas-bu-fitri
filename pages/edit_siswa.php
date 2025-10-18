<?php
// Form edit data siswa
session_start();
// Cek login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=Silakan login dulu!'); exit;
}
// Cek role guru
$role = $_SESSION['role'];
if ($role !== 'guru') {
    header('Location: dashboard.php?error=Anda tidak memiliki akses ke halaman ini!');
    exit;
}
// Koneksi db
require_once '../config/db.php';
// Ambil id dari url
$id = $_GET['id'] ?? '';
if (!$id) { header('Location: data_siswa.php'); exit; }
// Query ambil data siswa
$stmt = $conn->prepare('SELECT * FROM data_siswa WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
if (!$data) { header('Location: data_siswa.php'); exit; }
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
    <title>Edit Siswa</title>
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
    <div class="container shadow-sm">
        <!-- Container -->
        <h2 class="mb-4">Edit Siswa</h2>
        <!-- Judul -->
        <?php if (isset($_GET['error'])): ?>
            <!-- Jika error -->
            <div class="alert alert-danger shadow-sm fade show" role="alert">
                <!-- Alert error -->
                <?= htmlspecialchars($_GET['error']) ?>
                <!-- Pesan error -->
            </div>
        <?php endif; ?>
        <form action="process_edit_siswa.php" method="POST" autocomplete="off" novalidate>
            <!-- Form edit -->
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <!-- Hidden id -->
            <div class="mb-3">
                <!-- Div nama -->
                <label for="nama" class="form-label">Nama Lengkap</label>
                <!-- Label nama -->
                <input type="text" class="form-control" id="nama" name="nama" required maxlength="50" value="<?= htmlspecialchars($data['nama']) ?>">
                <!-- Input nama -->
            </div>
            <div class="mb-3">
                <!-- Div nis -->
                <label for="nis" class="form-label">NIS</label>
                <!-- Label nis -->
                <input type="text" class="form-control" id="nis" name="nis" required maxlength="20" value="<?= htmlspecialchars($data['nis']) ?>">
                <!-- Input nis -->
            </div>
            <div class="mb-3">
                <!-- Div kelas -->
                <label for="kelas" class="form-label">Kelas</label>
                <!-- Label kelas -->
                <input type="text" class="form-control" id="kelas" name="kelas" required maxlength="20" value="<?= htmlspecialchars($data['kelas']) ?>">
                <!-- Input kelas -->
            </div>
            <div class="mb-3">
                <!-- Div alamat -->
                <label for="alamat" class="form-label">Alamat</label>
                <!-- Label alamat -->
                <input type="text" class="form-control" id="alamat" name="alamat" maxlength="100" value="<?= htmlspecialchars($data['alamat']) ?>">
                <!-- Input alamat -->
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-2">Update</button>
            <!-- Tombol update -->
        </form>
        <a href="data_siswa.php" class="btn btn-secondary mt-3">Kembali ke Data Siswa</a>
        <!-- Link kembali -->
    </div>
</body>
<script>
<!-- Script -->
window.addEventListener('DOMContentLoaded', function() {
    // Tunggu load
    document.querySelectorAll('.container').forEach(function(el) {
        // Untuk container
        el.style.opacity = 1;
        // Opacity 1
        el.style.transform = 'none';
        // Transform none
    });
});
</script>
</html>
