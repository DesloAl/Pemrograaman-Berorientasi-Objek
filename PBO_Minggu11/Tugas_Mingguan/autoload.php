<?php

// Autoload: class/interface dimuat otomatis dari file <NamaClass>.php di folder ini
spl_autoload_register(function (string $kelas) {
    $file = __DIR__ . '/' . $kelas . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
