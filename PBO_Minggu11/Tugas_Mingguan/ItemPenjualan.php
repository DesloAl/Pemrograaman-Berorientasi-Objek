<?php

// Abstraksi untuk sesuatu yang dapat dijual dalam pesanan (DIP & OCP)
interface ItemPenjualan
{
    public function getKodeProduk(): string;
    public function getHarga(): float;
    public function cekStok(int $jumlah): bool;
    public function kurangiStok(int $jumlah): void;

    // Harus berisi kunci: kode_produk, nama_produk, harga, stok
    public function toArray(): array;
}
