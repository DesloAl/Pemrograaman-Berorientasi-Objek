<?php
class Mobil
{
    public $merek;
    public $warna;
    public $kecepatan;

    public function __construct($merek, $warna, $kecepatan)
    {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    public function getInfo()
    {
        echo "Merek       : " . $this->merek . "<br>";
        echo "Warna       : " . $this->warna . "<br>";
        echo "Kecepatan   : " . $this->kecepatan . " km/jam<br>";
    }

    public function jalankan()
    {
        echo "Mobil berjalan...<br>";
    }

    public function berhenti()
    {
        echo "Mobil berhenti<br>";
    }
}

$mobil1 = new Mobil("Toyota", "Hitam", 120);
$mobil2 = new Mobil("Honda", "Merah", 100);
$mobil3 = new Mobil("Mitsubishi", "Putih", 110);

echo "<h3>Mobil 1</h3>";
$mobil1->getInfo();
$mobil1->jalankan();
$mobil1->berhenti();

echo "<br>";

echo "<h3>Mobil 2</h3>";
$mobil2->getInfo();
$mobil2->jalankan();
$mobil2->berhenti();

echo "<br>";

echo "<h3>Mobil 3</h3>";
$mobil3->getInfo();
$mobil3->jalankan();
$mobil3->berhenti();

?>