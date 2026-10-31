<?php

class Produk implements ItemPenjualan
{
    private string $kodeProduk;
    private string $namaProduk;
    private float $harga;
    private int $stok;
    private static int $penghitung = 0;

    public function __construct(string $namaProduk, float $harga, int $stok)
    {
        self::$penghitung++;
        $this->kodeProduk = "P" . str_pad((string) self::$penghitung, 3, "0", STR_PAD_LEFT);
        $this->namaProduk = $namaProduk;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function cekStok(int $jumlah): bool
    {
        return $this->stok >= $jumlah;
    }

    public function kurangiStok(int $jumlah): void
    {
        if (!$this->cekStok($jumlah)) {
            throw new Exception("Stok {$this->namaProduk} tidak mencukupi");
        }
        $this->stok -= $jumlah;
    }

    public function getHarga(): float
    {
        return $this->harga;
    }

    public function getKodeProduk(): string
    {
        return $this->kodeProduk;
    }

    public function getNamaProduk(): string
    {
        return $this->namaProduk;
    }

    public function getStok(): int
    {
        return $this->stok;
    }

    public function toArray(): array
    {
        return [
            'kode_produk' => $this->kodeProduk,
            'nama_produk' => $this->namaProduk,
            'harga' => $this->harga,
            'stok' => $this->stok,
        ];
    }
}
