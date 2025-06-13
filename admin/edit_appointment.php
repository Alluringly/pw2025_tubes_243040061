<?php

include "../includes/db.php";

// Fungsi untuk mengambil nilai ID dari parameter kemudian menggunakan ID tersebut untuk
// Mengambil data satu janji temu (appointment) dari database

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$result = $conn->query("SELECT * FROM appointments WHERE id = $id");

// Fungsi untuk memvalidasi apakah query database berhasil dan mengembalikan data yang diharapkan
// Jika tidak ada data atau query gagal, akan menampilkan pesan error dan menghentikan eksekusi skrip
// Jika data ditemukan, data tersebut untuk digunakan lebih lanjut

if (!$result || $result->num_rows === 0) {
    echo "<div style='margin: 2rem; color: red;'>Data janji temu tidak ditemukan. <a href='manage_appointment.php'>Kembali</a></div>";
    exit();
}

$data = $result->fetch_assoc();

// Fungsi untuk memproses data yang dikirimkan melalui formulir untuk memperbarui catatan janji temu 
// Yang sudah ada di database kemudian mengarahkan user kembali ke halaman manajemen janji temu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];

    $stmt = $conn->prepare("UPDATE appointments SET fullname=?, email=?, date=?, time=?, notes=? WHERE id=?");
    $stmt->bind_param("sssssi", $fullname, $email, $date, $time, $notes, $id);
    $stmt->execute();

    header("Location: manage_appointment.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f0f0;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 1.5rem 0;
        }

        .health-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            color: #17a2b8;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="manage_appointment.php"><i class="fas fa-arrow-left"></i> Back to Manage</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card mx-auto shadow-sm" style="max-width: 600px;">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Appointment</h4>
                <form method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?= htmlspecialchars($data['fullname']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?= $data['date'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time" value="<?= $data['time'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"><?= htmlspecialchars($data['notes']) ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <p>&copy; 2025 Clinics Admin. All rights reserved.</p>
            <div class="health-icons">
                <i class="fas fa-heartbeat"></i>
                <i class="fas fa-stethoscope"></i>
                <i class="fas fa-notes-medical"></i>
                <i class="fas fa-user-md"></i>
            </div>
        </div>
    </footer>

</body>

</html>