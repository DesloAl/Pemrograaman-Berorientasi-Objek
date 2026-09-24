<?php
// Interface bentuk: kontrak yang wajib dipenuhi oleh setiap bentuk
interface bentuks
{
    public function hitungLuas();
}

// Class Persegi mengimplementasikan interface bentuk
class Persegi implements bentuks
{
    private $sisi;

    public function __construct($sisi)
    {
        $this->sisi = $sisi;
    }

    public function hitungLuas()
    {
        return $this->sisi * $this->sisi;
    }

    public function getKeterangan()
    {
        return "Persegi (sisi=" . $this->sisi . ")";
    }
}

// Class Lingkaran mengimplementasikan interface Bentuk
class Lingkaran implements bentuks
{
    const PI = 3.14;

    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function hitungLuas()
    {
        return self::PI * $this->radius * $this->radius;
    }

    public function getKeterangan()
    {
        return "Lingkaran (radius=" . $this->radius . ")";
    }
}

// Menampung objek Persegi dan Lingkaran dalam satu array
$daftarBentuk = [
    new Persegi(5),
    new Lingkaran(7)
];

// Loop untuk mencetak luas setiap bentuk
foreach ($daftarBentuk as $bentuk) {
    echo "Luas " . $bentuk->getKeterangan() . ": ";
    echo $bentuk->hitungLuas() . "<br>";
}
?>