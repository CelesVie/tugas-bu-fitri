<?php
// Proses login guru/siswa
require_once('../config/db.php');
session_start();

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    header('Location: login.php?error=Email dan password wajib diisi!'); exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: login.php?error=Format email tidak valid!'); exit;
}

$stmt = $conn->prepare('SELECT id, nama, email, password, role FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
if ($user && password_verify($password, $user['password'])) {
    // Set session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];
    header('Location: dashboard.php'); exit;
} else {
    header('Location: login.php?error=Email atau password salah!'); exit;
}
