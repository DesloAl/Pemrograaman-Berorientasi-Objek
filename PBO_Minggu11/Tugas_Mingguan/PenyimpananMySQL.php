<?php

// Implementasi penyimpanan ke MySQL; satu-satunya class yang berisi query SQL (SRP)
class PenyimpananMySQL implements PenyimpananProduk, PenyimpananPelanggan, PenyimpananPesanan
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    private function ada(string $tabel, string $kolom, string $nilai): bool
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM $tabel WHERE $kolom = ?");
        $stmt->execute([$nilai]);
        return $stmt->fetchColumn() > 0;
    }

    public function simpanProduk(ItemPenjualan $item): void
    {
        $p = $item->toArray();
        if ($this->ada('produk', 'kode_produk', $p['kode_produk'])) {
            $stmt = $this->db->prepare("UPDATE produk SET nama_produk = ?, harga = ?, stok = ? WHERE kode_produk = ?");
            $stmt->execute([$p['nama_produk'], $p['harga'], $p['stok'], $p['kode_produk']]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO produk (kode_produk, nama_produk, harga, stok) VALUES (?, ?, ?, ?)");
            $stmt->execute([$p['kode_produk'], $p['nama_produk'], $p['harga'], $p['stok']]);
        }
    }

    public function ambilStok(string $kodeProduk): int
    {
        $stmt = $this->db->prepare("SELECT stok FROM produk WHERE kode_produk = ?");
        $stmt->execute([$kodeProduk]);
        return (int) $stmt->fetchColumn();
    }

    public function simpanPelanggan(Pelanggan $pelanggan): void
    {
        $p = $pelanggan->toArray();
        if ($this->ada('pelanggan', 'id_pelanggan', $p['id_pelanggan'])) {
            $stmt = $this->db->prepare("UPDATE pelanggan SET nama = ?, email = ?, alamat = ? WHERE id_pelanggan = ?");
            $stmt->execute([$p['nama'], $p['email'], $p['alamat'], $p['id_pelanggan']]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO pelanggan (id_pelanggan, nama, email, alamat) VALUES (?, ?, ?, ?)");
            $stmt->execute([$p['id_pelanggan'], $p['nama'], $p['email'], $p['alamat']]);
        }
    }

    public function simpanPesanan(Pesanan $pesanan): void
    {
        $p = $pesanan->toArray();
        if ($this->ada('pesanan', 'nomor_pesanan', $p['nomor_pesanan'])) {
            $stmt = $this->db->prepare("UPDATE pesanan SET status_pesanan = ? WHERE nomor_pesanan = ?");
            $stmt->execute([$p['status_pesanan'], $p['nomor_pesanan']]);
            return;
        }

        $stmt = $this->db->prepare("INSERT INTO pesanan (nomor_pesanan, tanggal_pesanan, status_pesanan, id_pelanggan) VALUES (?, ?, ?, ?)");
        $stmt->execute([$p['nomor_pesanan'], $p['tanggal_pesanan'], $p['status_pesanan'], $p['id_pelanggan']]);

        $stmt = $this->db->prepare("INSERT INTO detail_pesanan (nomor_pesanan, kode_produk, jumlah, subtotal) VALUES (?, ?, ?, ?)");
        foreach ($p['detail'] as $d) {
            $stmt->execute([$p['nomor_pesanan'], $d['kode_produk'], $d['jumlah'], $d['subtotal']]);
        }
    }

    public function ambilRingkasan(string $nomorPesanan): array
    {
        $stmt = $this->db->prepare(
            "SELECT pl.nama, ps.nomor_pesanan, ps.status_pesanan, pr.nama_produk, d.jumlah, d.subtotal
             FROM pesanan ps
             JOIN pelanggan pl ON pl.id_pelanggan = ps.id_pelanggan
             JOIN detail_pesanan d ON d.nomor_pesanan = ps.nomor_pesanan
             JOIN produk pr ON pr.kode_produk = d.kode_produk
             WHERE ps.nomor_pesanan = ?"
        );
        $stmt->execute([$nomorPesanan]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
