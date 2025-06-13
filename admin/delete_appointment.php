<?php

include "../includes/db.php";

// Fungsi untuk melakukan validasi awal terhadap parameter id yang diterima. Jika parameter id tidak ada atau bukan merupakan angka
// Maka user akan diarahkan kembali ke halaman manajemen janji temu dengan pesan error

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: manage_appointment.php?error=invalid_id");
    exit();
}

// Fungsi untuk menghapus satu baris data (appointment) dari database berdasarkan ID yang diterima
// Kemudian mengarahkan user kembali ke halaman manajemen janji temu dengan pesan sukses

$id = intval($_GET['id']);
$conn->query("DELETE FROM appointments WHERE id = $id");

header("Location: manage_appointment.php?success=deleted");
exit();
