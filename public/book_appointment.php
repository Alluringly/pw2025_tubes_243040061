<?php

// Fungsi untuk menyertakan file-file PHP eksternal ke dalam skrip PHP yang sedang dijalankan

include '../includes/auth_check.php';
include '../includes/functions.php';
include '../includes/db.php';

// Fungsi untuk memastikan user telah login sebelum membuat daftar temu janji (appointments)

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $errorMessage = "You must be logged in to book an appointment.";
}

// Fungsi untuk memproses data yang dikirimkan oleh user melalui formulir temu janji (appointments) dan menyimpannya ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];

    $stmt = $conn->prepare("INSERT INTO appointments (fullname, email, date, time, notes) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullname, $email, $date, $time, $notes);

    // Fungsi untuk eksekusi prepared statement ke database dengan menambahkan parameter status sukses atau error dan menutup statement database

    if ($stmt->execute()) {
        header("Location: book_appointment.php?status=success");
        exit();
    } else {
        header("Location: book_appointment.php?status=error");
        exit();
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Book Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
        }

        .form-section {
            padding: 60px 0;
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

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fas fa-user-md"></i> Clinics</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container form-section">
        <?php

        // Fungsi untuk menampilkan pesan status sukses atau error kepada user di halaman web

        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo '<div class="message success">Appointment successfully added!</div>';
            } elseif ($_GET['status'] == 'error') {
                echo '<div class="message error">Failed to add appointment. Please try again.</div>';
            }
        }
        ?>

        <h2 class="text-center mb-5">Book an Appointment</h2>
        <form action="book_appointment.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" id="fullname" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="col-md-6">
                <label for="date" class="form-label">Appointment Date</label>
                <input type="date" name="date" class="form-control" id="date" required>
            </div>
            <div class="col-md-6">
                <label for="time" class="form-label">Time</label>
                <input type="time" name="time" class="form-control" id="time" required>
            </div>
            <div class="col-12">
                <label for="notes" class="form-label">Additional Notes</label>
                <textarea name="notes" class="form-control" id="notes" rows="3"></textarea>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success btn-lg">Submit Appointment</button>
            </div>
        </form>
    </div>

    <footer class="text-center">
        <div class="container">
            <p>&copy; 2025 Clinics. All rights reserved.</p>
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