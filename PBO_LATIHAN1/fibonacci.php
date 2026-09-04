<?php
$a = 0;
$b = 1;

for ($i = 1; $i <= 10; $i++) {
    echo $a;

    if ($i < 10) {
        echo ", ";
    }

    $next = $a + $b;
    $a = $b;
    $b = $next;
}

?>