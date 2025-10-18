<?php
// Proses logout
session_start();
// Hapus semua session
session_unset();
// Hancurkan session
session_destroy();
// Redirect ke login dengan pesan sukses
header('Location: login.php?success=Berhasil logout!');
exit;
