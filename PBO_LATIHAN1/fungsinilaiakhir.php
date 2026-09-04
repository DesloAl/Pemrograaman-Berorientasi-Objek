<?php
function hitungNilaiAkhir($uts, $uas, $tugas)
{
    $nilaiAkhir = ($uts * 0.30) +
                  ($uas * 0.40) +
                  ($tugas * 0.30);

    return (float) $nilaiAkhir;
}

$uts = 80;
$uas = 85;
$tugas = 90;

$nilai = hitungNilaiAkhir($uts, $uas, $tugas);

echo "=== NILAI AKHIR ===<br>";
echo "Nilai UTS   : $uts<br>";
echo "Nilai UAS   : $uas<br>";
echo "Nilai Tugas : $tugas<br>";
echo "Nilai Akhir : " . $nilai;

?>