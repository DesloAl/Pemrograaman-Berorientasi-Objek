<?php
// File: Mobil.php
class Mobil {
public $merek;
public $warna;
public $kecepatan;
public $tahun;
public function __construct($merek, $warna, $kecepatan, $tahun) {
$this->merek = $merek;
$this->warna = $warna;
$this->kecepatan = $kecepatan;
$this->tahun = $tahun;
}
public function getInfo() {
return "Mobil $this->merek ($this->tahun) berwarna $this->warna,

kecepatan $this->kecepatan km/jam";
}
public function percepat($tambahan) {
$this->kecepatan += $tambahan;
return "Kecepatan sekarang: $this->kecepatan km/jam";
}
public function rem($pengurangan) {
$this->kecepatan -= $pengurangan;
if ($this->kecepatan < 0) $this->kecepatan = 0;
return "Kecepatan sekarang: $this->kecepatan km/jam";
}
}
// Membuat 3 objek berbeda
$mobil1 = new Mobil("Toyota Avanza", "Putih", 80, 2020);
$mobil2 = new Mobil("Honda Civic", "Hitam", 120, 2022);
$mobil3 = new Mobil("Suzuki Ertiga", "Silver", 60, 2019);
echo $mobil1->getInfo() . "<br>";
echo $mobil2->getInfo() . "<br>";
echo $mobil3->getInfo() . "<br>";
echo $mobil1->percepat(20) . "<br>";