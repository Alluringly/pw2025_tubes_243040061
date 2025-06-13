<?php
include '../includes/auth_check.php';
include '../includes/functions.php';
include '../includes/db.php';

$message = '';
$message_type = '';

// Fungsi untuk memproses data yang dikirimkan oleh admin melalui formulir temu janji (appointments) dan menyimpannya ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];

    $stmt = $conn->prepare("INSERT INTO appointments (fullname, email, date, time, notes) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullname, $email, $date, $time, $notes);

    // Fungsi untuk eksekusi message ke database dengan menambahkan parameter status sukses atau error dan menutup statement database

    if ($stmt->execute()) {
        $message = "Appointment successfully added!";
        $message_type = "success";
    } else {
        $message = "Error: " . $stmt->error;
        $message_type = "danger";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 1.5rem 0;
            bottom: 0;
            width: 100%;
        }

        .health-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            color: #17a2b8;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-user-md"></i></a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Panel</a></li>
                    <li class="nav-item"><a class="nav-link" href="manage_appointment.php">Manage Appointments</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h3 class="mb-4 text-center">Add New Appointment</h3>

        <?php if ($message): ?>
            <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
                <?= $message ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card p-4">
            <form action="add_appointment.php" method="POST">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Appointment</button>
                <a href="manage_appointment.php" class="btn btn-secondary">Cancel</a>
            </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>