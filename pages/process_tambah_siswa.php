<?php
// Proses tambah data siswa
session_start();
// Cek login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=Silakan login dulu!'); exit;
}
// Koneksi db
require_once('../config/db.php');
// Ambil data dari form
$nama = trim($_POST['nama'] ?? '');
$nis = trim($_POST['nis'] ?? '');
$kelas = trim($_POST['kelas'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
// Validasi input
if ($nama === '' || $nis === '' || $kelas === '') {
    header('Location: tambah_siswa.php?error=Nama, NIS, dan Kelas wajib diisi!'); exit;
}
// Cek NIS unik
$stmt = $conn->prepare('SELECT id FROM data_siswa WHERE nis = ?');
$stmt->bind_param('s', $nis);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header('Location: tambah_siswa.php?error=NIS sudah terdaftar!'); exit;
}
$stmt->close();
// Query insert
$stmt = $conn->prepare('INSERT INTO data_siswa (nama, nis, kelas, alamat) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $nama, $nis, $kelas, $alamat);
if ($stmt->execute()) {
    header('Location: data_siswa.php'); exit;
} else {
    header('Location: tambah_siswa.php?error=Gagal menyimpan data!'); exit;
}
