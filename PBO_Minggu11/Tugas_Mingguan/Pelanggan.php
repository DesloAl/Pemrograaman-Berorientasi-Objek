<?php

class Pelanggan
{
    private string $idPelanggan;
    private string $nama;
    private string $email;
    private string $alamat;
    /** @var Pesanan[] */
    private array $daftarPesanan = [];
    private static int $penghitung = 0;

    public function __construct(string $nama, string $email, string $alamat)
    {
        self::$penghitung++;
        $this->idPelanggan = "PLG" . str_pad((string) self::$penghitung, 2, "0", STR_PAD_LEFT);
        $this->nama = $nama;
        $this->email = $email;
        $this->alamat = $alamat;
    }

    public function buatPesanan(): Pesanan
    {
        $nomor = "PSN-{$this->idPelanggan}-" . str_pad((string) (count($this->daftarPesanan) + 1), 3, "0", STR_PAD_LEFT);
        $pesanan = new Pesanan($nomor, $this);
        $this->daftarPesanan[] = $pesanan;
        return $pesanan;
    }

    public function ubahAlamat(string $alamat): void
    {
        $this->alamat = $alamat;
    }

    public function getDataPelanggan(): string
    {
        return "{$this->idPelanggan} | {$this->nama} | {$this->email} | {$this->alamat}";
    }

    public function getIdPelanggan(): string
    {
        return $this->idPelanggan;
    }

    public function getJumlahPesanan(): int
    {
        return count($this->daftarPesanan);
    }

    public function toArray(): array
    {
        return [
            'id_pelanggan' => $this->idPelanggan,
            'nama' => $this->nama,
            'email' => $this->email,
            'alamat' => $this->alamat,
        ];
    }
}
