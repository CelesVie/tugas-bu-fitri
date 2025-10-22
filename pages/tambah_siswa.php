<?php
require_once('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO data_siswa (nama, nis, kelas, alamat) VALUES ('$nama', '$nis', '$kelas', '$alamat')";
    $conn->query($query);

    header('Location: data_siswa.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Apple (Fallback pakai Inter) -->
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f7;
            font-family: 'SF Pro Display', 'Inter', 'Segoe UI', sans-serif;
        }

        .card-macos {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            padding: 30px;
            max-width: 800px;
            margin: 40px auto;
        }

        .input-macos {
            border-radius: 12px;
            border: 1px solid #d2d2d7;
            padding: 12px 15px;
            background: #fafafa;
            transition: all 0.2s ease;
        }
        .input-macos:focus {
            outline: none;
            border-color: #007aff;
            box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.2);
            background: #fff;
        }

        .btn-apple {
            background-color: #007aff;
            color: white;
            border-radius: 999px;
            padding: 12px 24px;
            border: none;
            font-weight: 500;
            transition: 0.2s;
        }
        .btn-apple:hover {
            background-color: #0063ce;
            box-shadow: 0 4px 10px rgba(0, 122, 255, 0.3);
        }

        .btn-secondary-apple {
            background-color: #d1d1d6;
            color: #000;
            border-radius: 12px;
            padding: 10px 20px;
            border: none;
            transition: 0.2s;
        }
        .btn-secondary-apple:hover {
            background-color: #bcbcc2;
        }

        label {
            font-weight: 500;
            margin-top: 15px;
        }

        h2 {
            font-weight: 600;
            margin-bottom: 20px;
            color: #1d1d1f;
        }
    </style>
</head>
<body>

<div class="card-macos">
    <h2>Tambah Siswa</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control input-macos" required>
        </div>

        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control input-macos" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control input-macos" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control input-macos" required>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="data_siswa.php" class="btn btn-secondary-apple">Kembali ke Data Siswa</a>
            <button type="submit" class="btn btn-apple">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
