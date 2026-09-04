<?php

class Product
{
    public $nama;
    public $harga;
    public $kategori;

    public function __construct($nama, $harga, $kategori)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    public function getInfo()
    {
        echo "Nama      : " . $this->nama . "<br>";
        echo "Harga     : Rp " . number_format($this->harga, 0, ',', '.') . "<br>";
        echo "Kategori  : " . $this->kategori . "<br>";
    }

    public function applyDiskon($persen)
    {
        $diskon = $this->harga * ($persen / 100);
        $this->harga = $this->harga - $diskon;
    }
}

$product1 = new Product("Laptop", 7500000, "Elektronik");
$product2 = new Product("Headset", 500000, "Aksesoris");

echo "<h3>Product 1</h3>";
$product1->getInfo();

$product1->applyDiskon(10);

echo "<b>Setelah diskon 10%:</b><br>";
$product1->getInfo();

echo "<br>";

echo "<h3>Product 2</h3>";
$product2->getInfo();

$product2->applyDiskon(20);

echo "<b>Setelah diskon 20%:</b><br>";
$product2->getInfo();

?>