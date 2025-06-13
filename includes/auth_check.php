<?php

// Fungsi untuk memastikan admin atau user sudah login dan proteksi halaman

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../authorize/login.php");
    exit();
}
