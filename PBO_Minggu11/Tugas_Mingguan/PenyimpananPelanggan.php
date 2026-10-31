<?php

// Interface kecil khusus penyimpanan pelanggan (ISP)
interface PenyimpananPelanggan
{
    public function simpanPelanggan(Pelanggan $pelanggan): void;
}
