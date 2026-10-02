<?php
// abstract class LayananCuci yang akan menjadi parent class untuk semua jenis layanan cuci mobil
abstract class LayananCuci
{
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId()         {
        return $this->id; 
        }
    public function getNama()       { 
        return $this->nama; 
        }
    public function getHargaDasar() { 
        return $this->hargaDasar; 
        }

    abstract public function hitungTotal();
    abstract public function getJenis();
    abstract public function cetakDetail();
}

// class CuciBiasa yang merupakan child class dari LayananCuci
class CuciBiasa extends LayananCuci{
    private $menit;

    public function __construct($id, $nama, $harga, $menit)
    {
        parent::__construct($id, $nama, $harga);
        $this->menit = $menit;
    }
    public function hitungTotal() { 
        return $this->hargaDasar + 1000 * $this->menit; 
        }
    public function getJenis()    { 
        return "Cuci Biasa"; 
        }
    public function cetakDetail() {
        echo "Jenis Layanan: Cuci Biasa<br>";
        echo "Waktu: {$this->menit} menit<br>";
    }
}

// class CuciSalju yang merupakan child class
class CuciSalju extends LayananCuci{
    private $menit;
    public function __construct($id, $nama, $harga, $menit)
    {
        parent::__construct($id, $nama, $harga);
        $this->menit = $menit;
    }
    public function hitungTotal() { 
        return $this->hargaDasar + 1500 * $this->menit; 
        }
    public function getJenis()    { 
        return "Cuci Salju"; 
        }
    public function cetakDetail() {
        echo "Jenis Layanan: Cuci Salju<br>";
        echo "Waktu: {$this->menit} menit<br>";
    }
}
// class Poles yang merupakan child class
class Poles extends LayananCuci{
    private $jam;
    public function __construct($id, $nama, $harga, $jam)
    {
        parent::__construct($id, $nama, $harga);
        $this->jam = $jam;
    }
    public function hitungTotal()
    {
        $total = $this->hargaDasar + (50000 * $this->jam);
        if ($this->jam > 6) {
            return $total-($total * 0.10); 
        }
        return $total;
    }
    public function getJenis() { 
        return "Poles"; 
        }
    public function cetakDetail() {
        echo "Jenis Layanan: Poles<br>";
        echo "Waktu: {$this->jam} jam<br>";
    }
}
// array untuk menyimpan objek layanan cuci mobil
$daftar = [
    new CuciBiasa("L001", "Deslo",20000, 30),
    new CuciSalju("L002", "Ghifari", 30000, 20),
    new Poles("L003","Deril", 100000, 8),
    new CuciBiasa("L004", "Budi",25000, 45),
    new Poles("L005","Siti",120000, 2),
];


// menampilkan output dengan data layanan cuci mobil
$total = 0;
foreach ($daftar as $i => $d) {
    $total += $d->hitungTotal();
    echo ($i + 1) . ". ID: {$d->getId()}, Nama: {$d->getNama()}, Jenis: {$d->getJenis()}, Harga Dasar: Rp " . number_format($d->getHargaDasar()) . ", Total: Rp " . number_format($d->hitungTotal()) . "<br>";
}
echo "Total Keseluruhan: Rp " . number_format($total) . "<br>";

// menampilkan detail layanan cuci mobil
foreach ($daftar as $d) {
    echo "<h3>Detail Layanan</h3>";
    echo "<p>ID: {$d->getId()}</p>";
    echo "<p>Nama: {$d->getNama()}</p>";
    echo "<p>Harga Dasar: Rp " . number_format($d->getHargaDasar()) . "</p>";
    $d->cetakDetail();
    echo "<p>Total: Rp " . number_format($d->hitungTotal()) . "</p><hr>";
}