<?php
// File: BankAccount.php
class BankAccount {
    private $saldo;
    private $nomorRekening;
    private $namaPemilik;
    public function __construct($nomorRekening,$namaPemilik) {
        $this->nomorRekening =$nomorRekening;
        $this->namaPemilik = $namaPemilik;
        $this->saldo = 0;
}
// Getter
    public function getSaldo() {
        return $this->saldo;
}
    public function getNomorRekening() {
        return $this->nomorRekening;
}
    public function getNamaPemilik() {
        return $this->namaPemilik;
}
// Method bisnis
    public function deposit($jumlah) {
        if ($jumlah <= 0) {
            throw new Exception("Jumlah deposit harus positif!"); }
        $this->saldo += $jumlah;
            return "Deposit Rp " . number_format($jumlah, 0, ',', '.') ." berhasil";
}
    public function withdraw($jumlah) {
        if ($jumlah <= 0) {
            throw new Exception("Jumlah penarikan harus positif!");
    }
        if ($jumlah > $this->saldo) {
            throw new Exception("Saldo tidak mencukupi!");
    }
    $this->saldo -= $jumlah;
        return "Penarikan Rp " . number_format($jumlah, 0, ',', '.')

    . " berhasil";
}
}
// Penggunaan
$account = new BankAccount("1234567890", "Budi Santoso");
echo "Pemilik: " . $account->getNamaPemilik() . "<br>";
echo "No Rekening: " . $account->getNomorRekening() . "<br>"; 
echo "Saldo Awal: Rp " . number_format($account->getSaldo(), 0, ',', '.') .
"<br>";
echo $account->deposit(1000000) . "<br>";
echo "Saldo Baru: Rp " . number_format($account->getSaldo(), 0, ',',
'.') . "<br>";
echo $account->withdraw(500000) . "<br>";
echo "Saldo Akhir: Rp " . number_format($account->getSaldo(), 0, ',',
'.') . "<br>";
?>