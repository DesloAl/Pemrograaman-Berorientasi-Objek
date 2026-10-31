<?php

// Penyimpanan alternatif di memori (array), dapat menggantikan PenyimpananMySQL (LSP)
class PenyimpananMemori implements PenyimpananProduk, PenyimpananPelanggan, PenyimpananPesanan
{
    private array $produk = [];
    private array $pelanggan = [];
    private array $pesanan = [];

    public function simpanProduk(ItemPenjualan $item): void
    {
        $data = $item->toArray();
        $this->produk[$data['kode_produk']] = $data;
    }

    public function ambilStok(string $kodeProduk): int
    {
        return (int) ($this->produk[$kodeProduk]['stok'] ?? 0);
    }

    public function simpanPelanggan(Pelanggan $pelanggan): void
    {
        $data = $pelanggan->toArray();
        $this->pelanggan[$data['id_pelanggan']] = $data;
    }

    public function simpanPesanan(Pesanan $pesanan): void
    {
        $data = $pesanan->toArray();
        $nomor = $data['nomor_pesanan'];
        if (isset($this->pesanan[$nomor])) {
            $this->pesanan[$nomor]['status_pesanan'] = $data['status_pesanan'];
            return;
        }
        $this->pesanan[$nomor] = $data;
    }

    public function ambilRingkasan(string $nomorPesanan): array
    {
        if (!isset($this->pesanan[$nomorPesanan])) {
            return [];
        }
        $p = $this->pesanan[$nomorPesanan];
        $hasil = [];
        foreach ($p['detail'] as $d) {
            $hasil[] = [
                'nama' => $this->pelanggan[$p['id_pelanggan']]['nama'],
                'nomor_pesanan' => $p['nomor_pesanan'],
                'status_pesanan' => $p['status_pesanan'],
                'nama_produk' => $this->produk[$d['kode_produk']]['nama_produk'],
                'jumlah' => $d['jumlah'],
                'subtotal' => $d['subtotal'],
            ];
        }
        return $hasil;
    }
}
