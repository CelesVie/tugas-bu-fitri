-- SQL untuk membuat tabel data_siswa (contoh CRUD)
CREATE TABLE IF NOT EXISTS data_siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    nis VARCHAR(20) NOT NULL UNIQUE,
    kelas VARCHAR(20) NOT NULL,
    alamat VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
