<?php
function hitungLuas($panjang, $lebar)
{
    return $panjang * $lebar;
}

$panjang = 10;
$lebar = 5;

$luas = hitungLuas($panjang, $lebar);

echo "=== PROGRAM LUAS PERSEGI PANJANG ===<br>";
echo "Panjang : " . $panjang . " cm<br>";
echo "Lebar   : " . $lebar . " cm<br>";
echo "Luas    : " . $luas . " cm²<br>";

?>