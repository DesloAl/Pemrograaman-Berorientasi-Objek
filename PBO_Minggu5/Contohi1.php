<?php
class Produk {
    protected $harga;
    protected $nama;

    public function __construct($nama, $harga) {
        $this->harga = $harga;
        $this->nama = $nama;
    }

    public function getInfo() {
        return 'Produk : ' . $this->nama . ' Harga : Rp' . $this->harga;
    }
}

class Konsumsi extends Produk {
    private $kategori;

    public function __construct($nama, $harga, $kategori) {
        parent::__construct($nama, $harga);
        $this->kategori = $kategori;
    }

    public function getInfo() {
        return 'Produk : ' . $this->nama . ' Harga : Rp' . $this->harga .
            ' Kategori : ' . $this->kategori;
    }
}

class Kendaraan extends Produk {
    private $merek;
    private $kategori;

    public function __construct($nama, $harga, $merek, $kategori) {
        parent::__construct($nama, $harga);
        $this->merek = $merek;
        $this->kategori = $kategori;
    }

    public function getInfo() {
        return 'Produk : ' . $this->nama . ' Harga : Rp' . $this->harga .
            ' Merek : ' . $this->merek . ' Kategori : ' . $this->kategori;
    }
}

$paracetamol = new Produk('Paracetamol', 5000);
echo $paracetamol->getInfo();
echo PHP_EOL;

$nasiuduk = new Konsumsi('Nasi Uduk', 20000, 'Makanan');
echo $nasiuduk->getInfo();
echo PHP_EOL;

$pajero = new Kendaraan('Pajero Sport', 550000000, 'Mitsubishi', 'Mobil');
echo $pajero->getInfo();
?>