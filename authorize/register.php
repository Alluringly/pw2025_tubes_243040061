<!DOCTYPE html>

<head>
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #f9f9f9;
        color: #343a40;
        font-family: 'Quicksand', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        flex-direction: column;
    }

    .register-box {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin-bottom: 20px;
    }

    .form-control {
        background-color: #f1f1f1;
        color: #343a40;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
        border-color: #28a745;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        width: 100%;
    }

    h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #343a40;
    }

    .text-center {
        text-align: center;
    }

    .auth-link {
        font-size: 0.9rem;
        color: #6c757d;
        text-decoration: none;
    }

    .auth-link:hover {
        color: #28a745;
        text-decoration: underline;
    }
</style>
</head>

<body>
    <div class="register-box">
        <h2>📝 Registration</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="register" class="btn btn-success">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a href="login.php" class="auth-link">Login now</a></p>
        </div>
    </div>
    <?php

    // Fungsi dari bagian proses registrasi untuk user

    include '../includes/db.php';
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = 'user';
        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name','$email', '$pass', '$role')";
        mysqli_query($conn, $sql);
        echo "<div class='alert alert-success'>Registration successful.</div>";
    }
    ?>
</body>

</html>