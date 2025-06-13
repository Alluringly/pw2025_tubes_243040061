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
            background: #f5f5f5;
        }

        .card-body {
            border-radius: 15px;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 1.5rem 0;
            position: absolute;
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
            <a class="navbar-brand" href="#"><i class="fas fa-user-md"></i> Admin Panel</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../public/index.php">Homepage</a></li>
                    <li class="nav-item"><a class="nav-link" href="../authorize/login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="mb-4 text-center">Dashboard Overview</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <a href="manage_appointment.php" class="card-link">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-calendar-check"></i> Total Appointments</h5>
                            <p class="card-text fs-4">5</p>
                        </div>
                </a>
            </div>
        </div>
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