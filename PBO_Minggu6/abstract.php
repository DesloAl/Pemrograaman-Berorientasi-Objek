<?php

// File: AbstractExample.php

// Abstract Class
abstract class Kendaraan {
    protected $merek;
    protected $tahun;

    public function __construct($merek, $tahun) {
        $this->merek = $merek;
        $this->tahun = $tahun;
    }

    // Abstract method
    abstract public function start();
    abstract public function getInfo();

    // Method biasa
    public function getMerek() {
        return $this->merek;
    }

    public function getTahun() {
        return $this->tahun;
    }
}

class Mobil extends Kendaraan {
    private $jumlahPintu;

    public function __construct($merek, $tahun, $jumlahPintu) {
        parent::__construct($merek, $tahun);
        $this->jumlahPintu = $jumlahPintu;
    }

    public function start() {
        return "Mesin mobil dinyalakan... Vroom!";
    }

    public function getInfo() {
        return "Mobil $this->merek tahun $this->tahun, $this->jumlahPintu pintu";
    }
}

class Motor extends Kendaraan {
    private $jenisMotor;

    public function __construct($merek, $tahun, $jenisMotor) {
        parent::__construct($merek, $tahun);
        $this->jenisMotor = $jenisMotor;
    }

    public function start() {
        return "Mesin motor dinyalakan... Ngeng!";
    }

    public function getInfo() {
        return "Motor $this->merek tahun $this->tahun, jenis $this->jenisMotor";
    }
}

// Penggunaan
$mobil = new Mobil("Toyota", 2022, 4);
$motor = new Motor("Yamaha", 2023, "Sport");

echo $mobil->getInfo() . "<br>";
echo $mobil->start() . "<br><br>";

echo $motor->getInfo() . "<br>";
echo $motor->start() . "<br>";

?>