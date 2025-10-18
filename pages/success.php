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
    <title>Registrasi Berhasil</title>
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
    <nav class="navbar navbar-expand-lg bg-white mb-4" style="box-shadow:0 4px 24px rgba(60,60,60,0.07);border-radius:0 0 22px 22px;transition:box-shadow 0.3s cubic-bezier(.77,0,.18,1);">
        <!-- Navbar -->
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center" style="min-height:62px;">
            <!-- Container -->
            <span class="navbar-brand mb-0 h1" style="font-weight:600;letter-spacing:-1px;font-size:1.25rem;transition:color 0.2s;">SMKN 5 Tangerang</span>
            <!-- Brand -->
            <div class="d-flex align-items-center gap-2">
                <!-- Div untuk link login -->
                <span style="color:#888;font-size:1rem;font-weight:500;letter-spacing:0.2px;">Sudah punya akun?</span>
                <!-- Teks -->
                <a href="login.php" class="btn btn-outline-primary" style="border-radius:16px;padding:7px 22px;font-weight:500;box-shadow:0 2px 8px rgba(60,60,60,0.06);transition:box-shadow 0.2s,background 0.2s,transform 0.2s;">Login</a>
                <!-- Tombol login -->
            </div>
        </div>
    </nav>
    <div class="container shadow-sm text-center">
        <!-- Container utama -->
        <svg width="64" height="64" fill="none" viewBox="0 0 24 24" style="margin-bottom:18px;"><circle cx="12" cy="12" r="12" fill="#e0ffe0"/><path d="M7 13l3 3 7-7" stroke="#2ecc71" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <!-- Icon check -->
        <h2>Registrasi Berhasil!</h2>
        <!-- Judul -->
        <p class="mt-2 mb-4" style="color:#555;">Akun Anda sudah terdaftar.<br>Silakan login untuk melanjutkan.</p>
        <!-- Pesan -->
        <a href="register.php" class="btn btn-primary w-100">Kembali ke Registrasi</a>
        <!-- Tombol kembali -->
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
