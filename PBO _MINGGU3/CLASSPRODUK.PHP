<?php
// File: Product.php
class Product {
public $nama;
public $harga;
public $stok;
public function __construct($nama, $harga, $stok) {
$this->nama = $nama;
$this->harga = $harga;
$this->stok = $stok;
}
public function getInfo() {
return "Produk: $this->nama<br>" .

"Harga: Rp " . number_format($this->harga, 0, ',', '.') .

"<br>" .

"Stok: $this->stok unit<br>";

}
public function kurangStok($jumlah) {
if ($jumlah <= $this->stok) {
$this->stok -= $jumlah;
return true;
}
return false;
}
}
// Penggunaan
$produk = new Product("Laptop Asus", 12000000, 10);
echo $produk->getInfo();
if ($produk->kurangStok(9)) {
echo "Pembelian berhasil! Stok tersisa: " . $produk->stok . "<br>";
} else {
echo "Stok tidak mencukupi!<br>";
}
?>