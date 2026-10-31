CREATE DATABASE IF NOT EXISTS toko_online;
USE toko_online;

DROP TABLE IF EXISTS detail_pesanan;
DROP TABLE IF EXISTS pesanan;
DROP TABLE IF EXISTS produk;
DROP TABLE IF EXISTS pelanggan;

CREATE TABLE pelanggan (
    id_pelanggan VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    alamat VARCHAR(255) NOT NULL
);

CREATE TABLE produk (
    kode_produk VARCHAR(10) PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga DECIMAL(12,2) NOT NULL,
    stok INT NOT NULL
);

CREATE TABLE pesanan (
    nomor_pesanan VARCHAR(20) PRIMARY KEY,
    tanggal_pesanan DATE NOT NULL,
    status_pesanan VARCHAR(30) NOT NULL,
    id_pelanggan VARCHAR(10) NOT NULL,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
);

CREATE TABLE detail_pesanan (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    nomor_pesanan VARCHAR(20) NOT NULL,
    kode_produk VARCHAR(10) NOT NULL,
    jumlah INT NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (nomor_pesanan) REFERENCES pesanan(nomor_pesanan),
    FOREIGN KEY (kode_produk) REFERENCES produk(kode_produk)
);
