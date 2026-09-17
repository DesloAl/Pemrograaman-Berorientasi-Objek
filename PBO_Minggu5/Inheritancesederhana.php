<?php
// File: inheritance.php

// Parent Class
class Produk {
    protected $nama;
    protected $harga;
    protected $merek;

    public function __construct($nama, $harga, $merek) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->merek = $merek;
    }

    public function getInfo() {
        return "Produk: $this->nama, Merek: $this->merek, Harga: Rp " .
            number_format($this->harga, 0, ',', '.');
    }

    public function getHarga() {
        return $this->harga;
    }
}

// Child Class - Makanan
class Makanan extends Produk {
    private $tanggalKadaluarsa;
    private $berat;

    public function __construct($nama, $harga, $merek, $tanggalKadaluarsa, $berat) {
        parent::__construct($nama, $harga, $merek);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
        $this->berat = $berat;
    }

    // Override method getInfo
    public function getInfo() {
        return parent::getInfo() .
            "<br>Berat: $this->berat gram" .
            "<br>Tanggal Kadaluarsa: $this->tanggalKadaluarsa" .
            "<br>Status: " . $this->cekKadaluarsa();
    }

    public function cekKadaluarsa() {
        $today = date('Y-m-d');
        return ($this->tanggalKadaluarsa < $today) ? "Kadaluarsa" : "Segar";
    }
}

// Child Class - Elektronik
class Elektronik extends Produk {
    private $garansi;
    private $daya;

    public function __construct($nama, $harga, $merek, $garansi, $daya) {
        parent::__construct($nama, $harga, $merek);
        $this->garansi = $garansi;
        $this->daya = $daya;
    }

    // Override method getInfo
    public function getInfo() {
        return parent::getInfo() .
            "<br>Garansi: $this->garansi bulan" .
            "<br>Daya: $this->daya watt";
    }
}

// Penggunaan
$makanan = new Makanan("Chitato", 15000, "Indofood", "2024-12-31", 200);
$elektronik = new Elektronik("Laptop", 15000000, "Asus", 24, 65);

echo "<h3>Info Makanan</h3>";
echo $makanan->getInfo() . "<br><br>";

echo "<h3>Info Elektronik</h3>";
echo $elektronik->getInfo() . "<br>";
?>