<?php
// Parent Class
class Produk {
    protected $merek;
    protected $harga;

    public function __construct($merek, $harga) {
        if ($harga < 0) {
            die("Error: Harga tidak boleh bernilai negatif!<br>");
        }
        $this->merek = $merek;
        $this->harga = $harga;
    }

    public function getInfo() {
        echo "Merek: " . $this->merek . "<br>";
        echo "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>";
    }
}

// Child Class 1
class Makanan extends Produk {
    private $tanggalKadaluarsa;

    public function __construct($merek, $harga, $tanggalKadaluarsa) {
        parent::__construct($merek, $harga);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    // Override method getInfo()
    public function getInfo() {
        echo "Produk: Makanan - Mie Instan<br>";
        parent::getInfo();
        echo "Tanggal Kadaluarsa: " . $this->tanggalKadaluarsa . "<br>";
        echo "Status: Segar<br>";
    }
}

// Child Class 2
class Elektronik extends Produk {
    private $garansi;

    public function __construct($merek, $harga, $garansi) {
        parent::__construct($merek, $harga);
        $this->garansi = $garansi;
    }

    // Override method getInfo()
    public function getInfo() {
        echo "Produk: Elektronik - Smart TV<br>";
        parent::getInfo();
        echo "Garansi: " . $this->garansi . " bulan<br>";
    }
}

$mie = new Makanan("Indomie", 3500, "2025-06-30");
$mie->getInfo();

echo "<br>";

$tv = new Elektronik("Samsung", 5000, 12);
$tv->getInfo();
?>