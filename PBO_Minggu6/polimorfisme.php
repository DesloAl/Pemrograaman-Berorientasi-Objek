<?php

// File: PolymorphismExample.php

interface Bentuk {
    public function hitungLuas();
    public function hitungKeliling();
    public function getNama();
}

class Persegi implements Bentuk {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }

    public function hitungKeliling() {
        return 4 * $this->sisi;
    }

    public function getNama() {
        return "Persegi";
    }
}

class Lingkaran implements Bentuk {
    private $radius;
    const PHI = 3.14;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function hitungLuas() {
        return self::PHI * $this->radius * $this->radius;
    }

    public function hitungKeliling() {
        return 2 * self::PHI * $this->radius;
    }

    public function getNama() {
        return "Lingkaran";
    }
}

class Segitiga implements Bentuk {
    private $alas;
    private $tinggi;
    private $sisiA;
    private $sisiB;
    private $sisiC;

    public function __construct($alas, $tinggi, $sisiA, $sisiB, $sisiC) {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
        $this->sisiA = $sisiA;
        $this->sisiB = $sisiB;
        $this->sisiC = $sisiC;
    }

    public function hitungLuas() {
        return 0.5 * $this->alas * $this->tinggi;
    }

    public function hitungKeliling() {
        return $this->sisiA + $this->sisiB + $this->sisiC;
    }

    public function getNama() {
        return "Segitiga";
    }
}

// Fungsi untuk menampilkan semua bentuk (Polimorfisme)
function tampilkanBentuk($bentuk) {
    echo "<h3>" . $bentuk->getNama() . "</h3>";
    echo "Luas: " . $bentuk->hitungLuas() . "<br>";
    echo "Keliling: " . $bentuk->hitungKeliling() . "<br>";
}

// Array of Shapes (Polimorfisme)
$bentukArray = [
    new Persegi(5),
    new Lingkaran(7),
    new Segitiga(6, 8, 5, 5, 6)
];

// Loop untuk setiap bentuk
foreach ($bentukArray as $bentuk) {
    tampilkanBentuk($bentuk);
}

?>