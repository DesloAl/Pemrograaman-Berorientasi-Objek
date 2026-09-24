<?php

// File: InterfaceExample.php

// Interface
interface Pembayaran {
    public function bayar($jumlah);
    public function getStatus();
    public function getMetode();
}

class GoPay implements Pembayaran {
    private $saldo;
    private $status;
    private $noHP;

    public function __construct($noHP, $saldo) {
        $this->noHP = $noHP;
        $this->saldo = $saldo;
        $this->status = "Belum Dibayar";
    }

    public function bayar($jumlah) {
        if ($jumlah > $this->saldo) {
            $this->status = "Gagal - Saldo Tidak Cukup";
            return false;
        }

        $this->saldo -= $jumlah;
        $this->status = "Berhasil Dibayar via GoPay";
        return true;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMetode() {
        return "GoPay ($this->noHP)";
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

class OVO implements Pembayaran {
    private $saldo;
    private $status;
    private $email;

    public function __construct($email, $saldo) {
        $this->email = $email;
        $this->saldo = $saldo;
        $this->status = "Belum Dibayar";
    }

    public function bayar($jumlah) {
        if ($jumlah > $this->saldo) {
            $this->status = "Gagal - Saldo Tidak Cukup";
            return false;
        }

        $this->saldo -= $jumlah;
        $this->status = "Berhasil Dibayar via OVO";
        return true;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMetode() {
        return "OVO ($this->email)";
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

class TransferBank implements Pembayaran {
    private $status;
    private $noRekening;
    private $bank;

    public function __construct($bank, $noRekening) {
        $this->bank = $bank;
        $this->noRekening = $noRekening;
        $this->status = "Belum Dibayar";
    }

    public function bayar($jumlah) {
        // Simulasi pembayaran via transfer
        $this->status = "Berhasil Dibayar via Transfer Bank (pending konfirmasi)";
        return true;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMetode() {
        return "Transfer Bank $this->bank ($this->noRekening)";
    }
}

// Fungsi yang menerima berbagai objek pembayaran (Polimorfisme)
function prosesPembayaran(Pembayaran $payment, $jumlah) {
    echo "Metode: " . $payment->getMetode() . "<br>";

    if ($payment->bayar($jumlah)) {
        echo "Status: " . $payment->getStatus() . "<br>";
    } else {
        echo "Status: " . $payment->getStatus() . "<br>";
    }

    echo "<br>";
}

// Penggunaan Polimorfisme
$gopay = new GoPay("08123456789", 100000);
$ovo = new OVO("user@email.com", 50000);
$transfer = new TransferBank("BCA", "1234567890");

prosesPembayaran($gopay, 50000);
prosesPembayaran($ovo, 75000);
prosesPembayaran($transfer, 1000000);

?>