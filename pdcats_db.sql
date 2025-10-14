-- Buat database
CREATE DATABASE IF NOT EXISTS pdcats_db;
USE pdcats_db;

-- Hapus tabel lama jika ada
DROP TABLE IF EXISTS kucing;
DROP TABLE IF EXISTS pembeli;

-- Tabel kucing
CREATE TABLE kucing (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  usia VARCHAR(50) NOT NULL,
  harga INT NOT NULL,
  gambar TEXT NOT NULL
);

-- Data awal kucing
INSERT INTO kucing (nama, usia, harga, gambar) VALUES
('Kucing Persia', '2 Tahun', 2500000, 'https://cdn.pixabay.com/photo/2016/02/10/16/37/cat-1192026_1280.jpg'),
('Kucing Maine Coon', '1 Tahun', 3500000, 'https://cdn.pixabay.com/photo/2015/03/27/13/16/cat-694730_1280.jpg'),
('Kucing Scottish Fold', '8 Bulan', 3000000, 'https://cdn.pixabay.com/photo/2016/11/29/09/32/cat-1867343_1280.jpg');

-- Tabel pembeli
CREATE TABLE pembeli (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  hp VARCHAR(20) NOT NULL,
  kucing VARCHAR(100) NOT NULL,
  tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
);
