<?php
// Percobaan program dengan PHP
echo "Hello, World!";
echo "<br>";
$nilai1 = 11;
echo "Nilai: $nilai1";
// Menampilkan luas persegi panjang
echo "<br>";
$panjang = 10;
$lebar = 5;
$luas = $panjang * $lebar;
echo "Luas persegi panjang: $luas";

function hitungluaspersegipanjang($panjang,$lebar){
    $luaspersegi = $panjang * $lebar;
    return $luaspersegi;
}
echo  "<br>";
echo "Luas persegi panjang: " . hitungluaspersegipanjang($panjang, $lebar);
?>