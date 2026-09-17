<?php
class Mobil {
    private $merek;
    private $warna;
    private $kecepatan;
    private $mesinHidup;

    public function __construct($merek, $warna) {
        $this->merek = $merek;
        $this->setWarna($warna);
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

    // Setter warna dengan validasi
    public function setWarna($warna) {
        if (empty($warna)) {
            throw new Exception("Warna tidak boleh kosong!");
        }

        if (strlen($warna) < 3) {
            throw new Exception("Warna minimal 3 karakter!");
        }

        $this->warna = $warna;
    }

    // Setter kecepatan dengan validasi
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            throw new Exception("Kecepatan tidak boleh negatif!");
        }

        if ($kecepatan > 200) {
            throw new Exception("Kecepatan maksimal 200 km/jam!");
        }

        $this->kecepatan = $kecepatan;
    }

    // Method menyalakan mesin
    public function startMesin() {
        $this->mesinHidup = true;
        return "Mesin dinyalakan";
    }

    // Method mematikan mesin
    public function stopMesin() {
        if ($this->kecepatan > 0) {
            throw new Exception(
                "Tidak bisa mematikan mesin saat mobil bergerak!"
            );
        }

        $this->mesinHidup = false;
        return "Mesin dimatikan";
    }

    // Method menampilkan informasi
    public function getInfo() {
        return "Mobil " . $this->merek .
               " berwarna " . $this->warna .
               ", kecepatan " . $this->kecepatan .
               " km/jam, mesin " .
               ($this->mesinHidup ? "hidup" : "mati");
    }
}


// Penggunaan
try {
    $mobil = new Mobil("Toyota", "Merah");

    echo $mobil->getInfo() . "<br>";

    echo $mobil->startMesin() . "<br>";

    $mobil->setKecepatan(100);
    echo "Kecepatan diubah menjadi: " .
         $mobil->getKecepatan() . " km/jam<br>";

    $mobil->setWarna("Hitam");
    echo "Warna diubah menjadi: " .
         $mobil->getWarna() . "<br>";

    echo $mobil->getInfo();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>