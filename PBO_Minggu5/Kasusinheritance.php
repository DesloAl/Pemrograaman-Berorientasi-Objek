<?php
// Parent Class
class Pegawai {
    protected $nama;
    protected $gajiPokok;

    public function __construct($nama, $gajiPokok) {
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
    }

    public function hitungGaji() {
        return $this->gajiPokok;
    }

    public function info() {
        echo $this->nama . " menerima gaji Rp " . number_format($this->hitungGaji(), 0, ',', '.') . "<br>";
    }
}

// Child Class 1 (meng-override hitungGaji())
class Manajer extends Pegawai {
    private $tunjanganJabatan;

    public function __construct($nama, $gajiPokok, $tunjanganJabatan) {
        parent::__construct($nama, $gajiPokok);
        $this->tunjanganJabatan = $tunjanganJabatan;
    }

    public function hitungGaji() {
        return $this->gajiPokok + $this->tunjanganJabatan;
    }
}

// Child Class 2 (tetap memakai hitungGaji() bawaan parent)
class Staf extends Pegawai {
}

$manajer = new Manajer("Budi", 8000000, 3000000);
$manajer->info();

$staf = new Staf("Siti", 5000000);
$staf->info();
?>