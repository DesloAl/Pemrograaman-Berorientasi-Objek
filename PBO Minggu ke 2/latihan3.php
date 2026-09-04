<?php
// Percobaan menggunakan fungsi untuk menghitung nilai akhir dan menentukan grade
$uts = 80;
$uas = 82;
$tugas = 83;
function hitungnilaiakhir($uts, $uas, $tugas){
    return ($uts * 0.3) + ($uas * 0.4) + ($tugas * 0.3);
}
echo"<br>";
$nilaiakhir=hitungnilaiakhir($uts, $uas, $tugas);
echo "Nilai Akhir: " . (float)$nilaiakhir;
echo"<br>";
$nilaiakhir=80;
if ($nilaiakhir >= 90) {
    echo "Nilai A";
} elseif ($nilaiakhir >= 80) {
    echo "Nilai B";
} elseif ($nilaiakhir >= 70) {
    echo "Nilai C";
} elseif ($nilaiakhir >= 60) {
    echo "Nilai D";
} else {
    echo "Nilai E";
}
?>