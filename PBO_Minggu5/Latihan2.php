```php
<?php

// File: MobilEncapsulated.php
class Mobil {
    private $merek;
    private $warna;
    private $kecepatan;
    private $mesinHidup;

    public function __construct($merek, $warna) {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = 0;
        $this->mesinHidup = false;
    }

    // Getter
    public function getMerek() {
        return $this->merek;
    }

    public function getWarna() {
        return $this->warna;
    }

    public function getKecepatan() {
        return $this->kecepatan;
    }

    public function isMesinHidup() {
        return $this->mesinHidup;
    }

    // Setter dengan validasi
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            throw new Exception("Kecepatan tidak boleh negatif!");
        }

        if (!$this->mesinHidup) {
            throw new Exception("Mesin harus hidup untuk mengatur
                kecepatan!");
        }

        $this->kecepatan = $kecepatan;
    }

    // Method bisnis
    public function startMesin() {
        $this->mesinHidup = true;
        return "Mesin dinyalakan";
    }

    public function stopMesin() {
        if ($this->kecepatan > 0) {
            throw new Exception("Tidak bisa mematikan mesin saat
                mobil bergerak!");
        }

        $this->mesinHidup = false;
        return "Mesin dimatikan";
    }

    public function percepat($tambahan) {
        if (!$this->mesinHidup) {
            throw new Exception("Mesin harus hidup untuk
                mempercepat!");
        }

        if ($tambahan < 0) {
            throw new Exception("Tambahan kecepatan harus positif!");
        }

        $this->kecepatan += $tambahan;
        return "Kecepatan sekarang: $this->kecepatan km/jam";
    }

    public function getInfo() {
        return "Mobil $this->merek berwarna $this->warna,
            kecepatan $this->kecepatan km/jam, mesin " .
            ($this->mesinHidup ? "hidup" : "mati");
    }
}

// Penggunaan
try {
    $mobil = new Mobil("Toyota", "Merah");
    echo $mobil->getInfo() . "<br>";
    echo $mobil->startMesin() . "<br>";
    echo $mobil->percepat(50) . "<br>";
    echo $mobil->getInfo() . "<br>";

    // Ini akan error - kecepatan tidak bisa negatif
    // $mobil->setKecepatan(-10);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}
?>
```
