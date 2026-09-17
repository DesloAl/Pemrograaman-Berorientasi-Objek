<?php
// File: trait_example.php

trait Logger {
    public function log($pesan) {
        echo "[" . date('Y-m-d H:i:s') . "] " . $pesan . "<br>";
    }
}

trait Validator {
    public function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validatePhone($phone) {
        return preg_match('/^[0-9]{10,13}$/', $phone);
    }
}

trait CRUD {
    public function save() {
        $this->log("Data disimpan");
        return true;
    }

    public function delete() {
        $this->log("Data dihapus");
        return true;
    }
}

class User {
    use Logger, Validator, CRUD;

    private $nama;
    private $email;
    private $phone;

    public function __construct($nama, $email, $phone) {
        $this->nama = $nama;

        if ($this->validateEmail($email)) {
            $this->email = $email;
        } else {
            throw new Exception("Email tidak valid");
        }

        if ($this->validatePhone($phone)) {
            $this->phone = $phone;
        } else {
            throw new Exception("Nomor telepon tidak valid");
        }

        $this->log("User baru dibuat: $nama");
    }

    public function getInfo() {
        return "Nama: $this->nama, Email: $this->email, Phone: $this->phone";
    }
}

// Penggunaan
try {
    $user = new User("Budi", "budi@email.com", "08123456789");
    echo $user->getInfo() . "<br>";
    $user->save();
    $user->delete();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>