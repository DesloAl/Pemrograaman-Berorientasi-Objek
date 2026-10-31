<?php

// Interface kecil khusus penyimpanan pesanan (ISP)
interface PenyimpananPesanan
{
    public function simpanPesanan(Pesanan $pesanan): void;
    public function ambilRingkasan(string $nomorPesanan): array;
}
