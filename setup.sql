
-- Database & table
CREATE DATABASE IF NOT EXISTS marketplace_akun CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE marketplace_akun;
CREATE TABLE IF NOT EXISTS produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  slug VARCHAR(160) NOT NULL UNIQUE,
  deskripsi TEXT NOT NULL,
  harga INT NOT NULL,
  durasi VARCHAR(50) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_slug (slug)
) ENGINE=InnoDB;
INSERT INTO produk (nama, slug, deskripsi, harga, durasi) VALUES
('Akun Streaming Premium - Anti Household','netflix','Paket: Rp186.000; Member: 4; Harga Teman: Rp46.500; Biaya Admin: Rp5.000; Harga Paket Bulanan: Rp51.500.',51500,'bulan'),
('Akun Streaming Premium - Keluarga','youtube','Paket: Rp154.290; Member: 5; Harga Teman: Rp30.858; Biaya Admin: Rp5.000; Harga Paket Bulanan: Rp35.858.',35858,'bulan');
