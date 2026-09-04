<?php

class PersegiPanjang{
    public $panjang;
    public $lebar;

    public function luas() {
        return $this->panjang * $this->lebar;
    }
}

$kotak = new PersegiPanjang();
$kotak->panjang = 100;
$kotak->lebar = 50;

$kotak2 = new PersegiPanjang();
$kotak2->panjang = 100;
$kotak2->lebar = 50;

echo "kotak = ".$kotak->luas();
echo "<br>";
echo "kotak2 = ".$kotak2->luas();

?>