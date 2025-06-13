<?php

// Fungsi untuk mengacak (hash) password supaya tidak disimpan dalam bentuk asli demi keamanan

$password = "123";
$hashed = password_hash($password, PASSWORD_DEFAULT);

echo "Real password: " . $password . "<br>";
echo "Password hashed: " . $hashed;
