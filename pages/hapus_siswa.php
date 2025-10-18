<?php
// Proses hapus data siswa
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
// Query hapus data
$stmt = $conn->prepare('DELETE FROM data_siswa WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
// Redirect ke data siswa
header('Location: data_siswa.php');
exit;
