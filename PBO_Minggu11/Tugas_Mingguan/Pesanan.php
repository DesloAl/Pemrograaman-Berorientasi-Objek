<?php

class Pesanan
{
    private DateTime $tanggalPesanan;
    private string $nomorPesanan;
    private string $statusPesanan;
    private Pelanggan $pelanggan;
    /** @var DetailPesanan[] */
    private array $detailPesanan = [];

    public function __construct(string $nomorPesanan, Pelanggan $pelanggan)
    {
        $this->nomorPesanan = $nomorPesanan;
        $this->pelanggan = $pelanggan;
        $this->tanggalPesanan = new DateTime();
        $this->statusPesanan = "Menunggu Pembayaran";
    }

    public function tambahProduk(ItemPenjualan $produk, int $jumlah): void
    {
        $produk->kurangiStok($jumlah);
        $this->detailPesanan[] = new DetailPesanan($produk, $jumlah);
    }

    public function hitungTotal(): float
    {
        $total = 0;
        foreach ($this->detailPesanan as $detail) {
            $total += $detail->hitungSubtotal();
        }
        return $total;
    }

    public function ubahStatus(string $status): void
    {
        $this->statusPesanan = $status;
    }

    public function getNomorPesanan(): string
    {
        return $this->nomorPesanan;
    }

    public function getStatusPesanan(): string
    {
        return $this->statusPesanan;
    }

    public function getTanggalPesanan(): string
    {
        return $this->tanggalPesanan->format('d-m-Y');
    }

    public function getJumlahItem(): int
    {
        return count($this->detailPesanan);
    }

    public function toArray(): array
    {
        return [
            'nomor_pesanan' => $this->nomorPesanan,
            'tanggal_pesanan' => $this->tanggalPesanan->format('Y-m-d'),
            'status_pesanan' => $this->statusPesanan,
            'id_pelanggan' => $this->pelanggan->getIdPelanggan(),
            'detail' => array_map(fn($d) => $d->toArray(), $this->detailPesanan),
        ];
    }
}
