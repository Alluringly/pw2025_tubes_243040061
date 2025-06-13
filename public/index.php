<?php

include '../includes/auth_check.php';
include '../includes/functions.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .hero {
            height: 80vh;
            background-image: url('../assets/clinics.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            text-shadow: 1px 1px 4px #000;
            position: relative;
            z-index: 1;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: -1;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-user-md"></i> Clinics</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../authorize/login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero text-center">
        <h1 class="display-4">Book Your Medical Appointment</h1>
        <p class="lead mb-4">Fast. Easy. Reliable.</p>
        <a href="book_appointment.php" class="btn btn-primary btn-lg">Start Booking an Appointment</a>
    </section>

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