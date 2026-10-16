<?php
require_once '../Catatan.php';

$c = new Catatan();
$hasil = $c ->setJudul("Kelima")
            ->setIsi("Belajar PBO itu menyenangkan")
            ->save();
echo $hasil ? "Berhasil disimpan" : "Gagal";