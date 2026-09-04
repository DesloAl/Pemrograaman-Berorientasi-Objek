<?php
class Mahasiswa {
    private $nama;

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}

$mhs = new Mahasiswa();
$mhs->setNama("Budi");
echo $mhs->getNama();
?>