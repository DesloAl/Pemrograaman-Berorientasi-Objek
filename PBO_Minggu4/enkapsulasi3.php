<?php
class Mahasiswa {
    protected $nama;
    
}

class MahasiswaBaru extends Mahasiswa {
    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}

$mhs = new MahasiswaBaru();
$mhs->setNama("Budi");
echo $mhs->getNama();
?>