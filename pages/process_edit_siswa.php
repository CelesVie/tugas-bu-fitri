<?php
// Proses update data siswa
session_start();
// Cek login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=Silakan login dulu!'); exit;
}
// Koneksi db
require_once '../config/db.php';
// Ambil data dari form
$id = $_POST['id'] ?? '';
$nama = trim($_POST['nama'] ?? '');
$nis = trim($_POST['nis'] ?? '');
$kelas = trim($_POST['kelas'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
// Validasi input
if ($id === '' || $nama === '' || $nis === '' || $kelas === '') {
    header('Location: edit_siswa.php?id='.$id.'&error=Nama, NIS, dan Kelas wajib diisi!'); exit;
}
// Cek NIS unik (kecuali data sendiri)
$stmt = $conn->prepare('SELECT id FROM data_siswa WHERE nis = ? AND id != ?');
$stmt->bind_param('si', $nis, $id);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header('Location: edit_siswa.php?id='.$id.'&error=NIS sudah terdaftar!'); exit;
}
$stmt->close();
// Query update
$stmt = $conn->prepare('UPDATE data_siswa SET nama=?, nis=?, kelas=?, alamat=? WHERE id=?');
$stmt->bind_param('ssssi', $nama, $nis, $kelas, $alamat, $id);
if ($stmt->execute()) {
    header('Location: data_siswa.php'); exit;
} else {
    header('Location: edit_siswa.php?id='.$id.'&error=Gagal update data!'); exit;
}
