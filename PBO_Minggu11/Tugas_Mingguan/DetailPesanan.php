<?php

class DetailPesanan
{
    private int $jumlah;
    private float $subtotal;
    private ItemPenjualan $produk;

    public function __construct(ItemPenjualan $produk, int $jumlah)
    {
        $this->produk = $produk;
        $this->jumlah = $jumlah;
        $this->subtotal = $this->hitungSubtotal();
    }

    public function hitungSubtotal(): float
    {
        return $this->jumlah * $this->produk->getHarga();
    }

    public function getJumlah(): int
    {
        return $this->jumlah;
    }

    public function toArray(): array
    {
        return [
            'kode_produk' => $this->produk->getKodeProduk(),
            'jumlah' => $this->jumlah,
            'subtotal' => $this->subtotal,
        ];
    }
}
