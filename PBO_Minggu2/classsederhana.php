<?php
// File: Mahasiswa.php
class Mahasiswa {
// Properti
public $nama;
public $nim;
public $jurusan;
// Constructor
public function __construct($nama, $nim, $jurusan) {
$this->nama = $nama;
$this->nim = $nim;
$this->jurusan = $jurusan;
}
// Method
public function getInfo() {

return "Nama: $this->nama, NIM: $this->nim, Jurusan:

$this->jurusan";
}
public function setJurusan($jurusan) {
$this->jurusan = $jurusan;
}
}
// Instansiasi objek
$mhs1 = new Mahasiswa("Budi Santoso", "20240001", "Sistem Informasi");
$mhs2 = new Mahasiswa("Ani Wijaya", "20240002", "Teknik Informatika");
echo $mhs1->getInfo() . "<br>";
echo $mhs2->getInfo() . "<br>";
$mhs1->setJurusan("Manajemen Informatika");
echo $mhs1->getInfo() . "<br>";
?>