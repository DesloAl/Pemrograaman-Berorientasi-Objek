<?php
// Percobaan program dengan OOP
class perhitung{
    public $angka1;
    public $angka2;

    public function penjumlahan($angka1, $angka2){
        return $angka1 + $angka2;
    }
}
echo "<br>";
$hitng=new perhitung();
echo "Hasil penjumlahan: ". $hitng->penjumlahan(12, 5);
echo "<br>";

// Menampilkan luas persegi panjang dengan OOP
class persegipanjang{
    public $panjang;
    public $lebar;

    public function luas($panjang, $lebar){
        return $panjang * $lebar;
    }
}

$persegi=new persegipanjang();
$persegi->panjang=10;
$persegi->lebar=5;
echo "<br>";
echo "Luas persegi panjang: ". $persegi->luas();
?>