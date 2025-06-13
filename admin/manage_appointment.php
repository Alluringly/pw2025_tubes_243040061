<?php

include '../includes/auth_check.php';
include '../includes/functions.php';
include '../includes/db.php';

$result = $conn->query("SELECT * FROM appointments ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Manage Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f9f9f9;
    }

    table th,
    table td {
      vertical-align: middle;
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
      <a class="navbar-brand" href="#"><i class="fas fa-user-md"></i></a>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="dashboard.php">Panel</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container py-5">
    <h3 class="mb-4 text-center">Manage Appointments</h3>
    <div class="text-center mb-4">
      <a href="add_appointment.php" class="btn btn-success">
        <i class="fas fa-plus-circle"></i> Add New Appointment
      </a>
    </div>
    <?php if ($result->num_rows > 0): ?>
      <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white">
          <thead class="table-dark">
            <tr>
              <th>No.</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Time</th>
              <th>Notes</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php

            // Fungsi untuk menampilkan data dari database ke dalam bentuk tabel secara dinamis

            $counter = 1;
            while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $counter ?></td>
                <td><?= htmlspecialchars($row['fullname']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['time'] ?></td>
                <td><?= htmlspecialchars($row['notes']) ?></td>
                <td>
                  <a href="edit_appointment.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="delete_appointment.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?');">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
            <?php
              $counter++;
            endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="alert alert-info text-center">No Appointment data yet.</div>
    <?php endif; ?>
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