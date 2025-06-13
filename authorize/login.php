<!DOCTYPE html>

<head>
    <title>Login</title>
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

    .login-box {
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
    <div class="login-box">
        <h2>🚀 Login</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-success">Login</button>
        </form>
        <div class="text-center mt-3">
            <p>Don't have an account? <a href="register.php" class="auth-link">Register now</a></p>
        </div>
    </div>
    <?php

    // Fungsi untuk memverifikasi user berdasarkan email dan password, lalu tertuju ke halaman yang sesuai (role admin atau user)

    include '../includes/db.php';
    session_start();
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($pass, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: ../" . ($user['role'] === 'admin' ? 'admin/dashboard.php' : 'public/index.php'));
            exit();
        } else {
            echo "<div class='alert alert-danger'>Email or Password wrong.</div>";
        }
    }
    ?>
</body>

</html>