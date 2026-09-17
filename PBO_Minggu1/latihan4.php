<?php
class mahasiswa{
    public $nama;
    public $nim;
    public $prodi;
    public $tugas;
    public $uts;
    public $uas;

    public function perkenalan(){
        return "Halo, nama saya " . $this->nama . ", NIM saya " . $this->nim . ", dan saya mahasiswa " . $this->prodi . ".";
    }

    public function hitungNilaiAkhir(){
        return ($this->uts * 0.3) + ($this->uas * 0.4) + ($this->tugas * 0.3);
    }
}

echo "<br>";
$mahasiswa1 = new mahasiswa();
$mahasiswa1->nama = "John Doe";
$mahasiswa1->nim = "123456";
$mahasiswa1->prodi = "Teknik Informatika";

echo $mahasiswa1->perkenalan();
echo "<br>";
echo "Nilai Akhir: " . $mahasiswa1->hitungNilaiAkhir();

?>