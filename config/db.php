<?php
// Koneksi ke database MySQL
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'kelompokdb';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}
// Pastikan file ini di-include di file PHP lain yang butuh koneksi database
