<?php

require_once __DIR__ . '/autoload.php';

function rp(float $angka): string
{
    return "Rp " . number_format($angka, 0, ",", ".");
}

// Simulasi hanya bergantung pada interface penyimpanan, bukan pada MySQL (DIP)
function jalankanSimulasi(
    PenyimpananProduk $dbProduk,
    PenyimpananPelanggan $dbPelanggan,
    PenyimpananPesanan $dbPesanan
): void {
    // 1. Membuat objek Produk dan Pelanggan, lalu simpan ke database
    $laptop = new Produk("Laptop", 8000000, 5);
    $mouse  = new Produk("Mouse", 150000, 10);
    $budi   = new Pelanggan("Budi", "budi@mail.com", "Jl. Ahmad Yani, Pontianak");

    $dbProduk->simpanProduk($laptop);
    $dbProduk->simpanProduk($mouse);
    $dbPelanggan->simpanPelanggan($budi);

    echo "=== DATA PELANGGAN ===\n";
    echo $budi->getDataPelanggan() . "\n\n";

    // 2. Pelanggan mengubah alamat
    $budi->ubahAlamat("Jl. Imam Bonjol, Pontianak");
    $dbPelanggan->simpanPelanggan($budi);
    echo "=== SETELAH UBAH ALAMAT ===\n";
    echo $budi->getDataPelanggan() . "\n\n";

    // 3. Pelanggan membuat pesanan (relasi Pelanggan - Pesanan)
    $pesanan = $budi->buatPesanan();
    echo "=== PESANAN DIBUAT ===\n";
    echo "No. Pesanan : " . $pesanan->getNomorPesanan() . "\n";
    echo "Tanggal     : " . $pesanan->getTanggalPesanan() . "\n";
    echo "Status      : " . $pesanan->getStatusPesanan() . "\n\n";

    // 4. Menambahkan beberapa produk (relasi Pesanan - DetailPesanan - Produk)
    echo "=== TAMBAH PRODUK ===\n";
    echo "Stok awal Laptop: " . $laptop->getStok() . ", Mouse: " . $mouse->getStok() . "\n";
    $pesanan->tambahProduk($laptop, 2);
    $pesanan->tambahProduk($mouse, 3);
    echo "Jumlah item dalam pesanan: " . $pesanan->getJumlahItem() . "\n";
    echo "Stok akhir Laptop: " . $laptop->getStok() . ", Mouse: " . $mouse->getStok() . "\n\n";

    // 5. Menghitung total
    echo "=== TOTAL PESANAN ===\n";
    echo "Total: " . rp($pesanan->hitungTotal()) . "\n\n";

    // 6. Simpan pesanan beserta detailnya dan stok terbaru
    $dbPesanan->simpanPesanan($pesanan);
    $dbProduk->simpanProduk($laptop);
    $dbProduk->simpanProduk($mouse);

    // 7. Mengubah status lalu simpan lagi (update)
    $pesanan->ubahStatus("Dibayar");
    $dbPesanan->simpanPesanan($pesanan);
    echo "=== UBAH STATUS ===\n";
    echo "Status: " . $pesanan->getStatusPesanan() . "\n\n";

    echo "=== DATA TERSIMPAN ===\n";
    foreach ($dbPesanan->ambilRingkasan($pesanan->getNomorPesanan()) as $baris) {
        echo "{$baris['nomor_pesanan']} | {$baris['nama']} | {$baris['status_pesanan']} | "
            . "{$baris['nama_produk']} x{$baris['jumlah']} | " . rp($baris['subtotal']) . "\n";
    }
    echo "Stok Laptop tersimpan: " . $dbProduk->ambilStok($laptop->getKodeProduk()) . "\n";
    echo "Stok Mouse tersimpan: " . $dbProduk->ambilStok($mouse->getKodeProduk()) . "\n\n";

    // 8. Pengujian stok tidak cukup
    echo "=== UJI STOK TIDAK CUKUP ===\n";
    echo "Stok Laptop cukup untuk 10 unit? " . ($laptop->cekStok(10) ? "Ya" : "Tidak") . "\n";
    try {
        $pesanan->tambahProduk($laptop, 10);
    } catch (Exception $e) {
        echo "Gagal: " . $e->getMessage() . "\n";
    }
}

// ===== Pilih penyimpanan =====
// php main.php          -> MySQL (tabel dari toko_online.sql)
// php main.php memori   -> penyimpanan di memori, tanpa database
$pilihan = $argv[1] ?? 'mysql';
$penyimpanan = $pilihan === 'memori'
    ? new PenyimpananMemori()
    : new PenyimpananMySQL(Database::getInstance());

jalankanSimulasi($penyimpanan, $penyimpanan, $penyimpanan);
