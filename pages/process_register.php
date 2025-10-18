<?php
// Proses registrasi guru/siswa
require_once ('../config/db.php');
// Ambil data POST & validasi
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$role = $_POST['role'] ?? '';
// Validasi sederhana
if ($nama === '' || $email === '' || $password === '' || $role === '') {
    header('Location: register.php?error=Semua field wajib diisi!'); exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: register.php?error=Format email tidak valid!'); exit;
}
if (strlen($password) < 8) {
    header('Location: register.php?error=Password minimal 8 karakter!'); exit;
}
if (!in_array($role, ['guru', 'siswa'])) {
    header('Location: register.php?error=Peran tidak valid!'); exit;
}
// Cek email sudah terdaftar?
$stmt = $conn->prepare('SELECT id FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header('Location: register.php?error=Email sudah terdaftar!'); exit;
}
$stmt->close();
// Hash password
$hash = password_hash($password, PASSWORD_DEFAULT);
// Simpan ke database
$stmt = $conn->prepare('INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $nama, $email, $hash, $role);
if ($stmt->execute()) {
    header('Location: success.php'); exit;
} else {
    header('Location: register.php?error=Gagal menyimpan data!'); exit;
}
