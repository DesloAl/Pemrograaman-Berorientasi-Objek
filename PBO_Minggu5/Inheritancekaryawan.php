<?php
// File: KaryawanInheritance.php

// Parent Class
class Karyawan {
    protected $nama;
    protected $nik;
    protected $gajiPokok;

    public function __construct($nama, $nik, $gajiPokok) {
        $this->nama = $nama;
        $this->nik = $nik;
        $this->gajiPokok = $gajiPokok;
    }

    public function getInfo() {
        return "Nama: $this->nama, NIK: $this->nik, Gaji Pokok: Rp " .
            number_format($this->gajiPokok, 0, ',', '.');
    }

    public function hitungGaji() {
        return $this->gajiPokok;
    }
}

// Child Class - Karyawan Tetap
class KaryawanTetap extends Karyawan {
    private $tunjangan;
    private $bonus;

    public function __construct($nama, $nik, $gajiPokok, $tunjangan, $bonus) {
        parent::__construct($nama, $nik, $gajiPokok);
        $this->tunjangan = $tunjangan;
        $this->bonus = $bonus;
    }

    public function hitungGaji() {
        return parent::hitungGaji() + $this->tunjangan + $this->bonus;
    }

    public function getInfo() {
        return parent::getInfo() .
            "<br>Tunjangan: Rp " . number_format($this->tunjangan, 0, ',', '.') .
            "<br>Bonus: Rp " . number_format($this->bonus, 0, ',', '.') .
            "<br>Total Gaji: Rp " . number_format($this->hitungGaji(), 0, ',', '.');
    }
}

// Child Class - Karyawan Kontrak
class KaryawanKontrak extends Karyawan {
    private $durasiKontrak; // dalam bulan
    private $insentif;

    public function __construct($nama, $nik, $gajiPokok, $durasiKontrak, $insentif) {
        parent::__construct($nama, $nik, $gajiPokok);
        $this->durasiKontrak = $durasiKontrak;
        $this->insentif = $insentif;
    }

    public function hitungGaji() {
        return parent::hitungGaji() + $this->insentif;
    }

    public function getInfo() {
        return parent::getInfo() .
            "<br>Durasi Kontrak: $this->durasiKontrak bulan" .
            "<br>Insentif: Rp " . number_format($this->insentif, 0, ',', '.') .
            "<br>Total Gaji: Rp " . number_format($this->hitungGaji(), 0, ',', '.');
    }
}

// Penggunaan
$karyawanTetap = new KaryawanTetap("Budi", "K001", 5000000, 1500000, 1000000);
$karyawanKontrak = new KaryawanKontrak("Ani", "K002", 4000000, 12, 500000);

echo "<h3>Karyawan Tetap</h3>";
echo $karyawanTetap->getInfo() . "<br><br>";

echo "<h3>Karyawan Kontrak</h3>";
echo $karyawanKontrak->getInfo() . "<br>";
?>