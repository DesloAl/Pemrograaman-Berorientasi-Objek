<?php
// Trait 1
trait Logger {
    public function log($pesan) {
        echo "[LOG] " . $pesan . "<br>";
    }
}

// Trait 2
trait Notifier {
    public function kirimNotifikasi($pesan) {
        echo "[NOTIFIKASI] " . $pesan . "<br>";
    }
}

// Class Karyawan dan Pesanan tidak berkerabat (tidak ada hubungan extends),
// namun keduanya butuh perilaku logging dan notifikasi yang sama.
class Karyawan {
    use Logger, Notifier;
}

class Pesanan {
    use Logger, Notifier;
}

$karyawan = new Karyawan();
$karyawan->log("Karyawan Budi telah melakukan presensi");
$karyawan->kirimNotifikasi("Presensi berhasil dicatat");

echo "<br>";

$pesanan = new Pesanan();
$pesanan->log("Pesanan #1023 telah dibuat");
$pesanan->kirimNotifikasi("Pesanan Anda sedang diproses");
?>