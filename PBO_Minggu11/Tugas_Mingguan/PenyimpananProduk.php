<?php

// Interface kecil khusus penyimpanan produk (ISP)
interface PenyimpananProduk
{
    public function simpanProduk(ItemPenjualan $item): void;
    public function ambilStok(string $kodeProduk): int;
}
