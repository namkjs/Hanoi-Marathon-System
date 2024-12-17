<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="login-page">
    <?php include('includes/navbar.php'); ?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card login-card p-4">
            <div class="text-center mb-3">
                <h2>Welcome Back</h2>
                <p class="text-muted">Login to your account</p>
            </div>

            <!-- Hiển thị thông báo lỗi -->
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger text-center' role='alert'>".$_SESSION['error']."</div>";
                unset($_SESSION['error']); // Xóa session sau khi hiển thị
            }
            ?>

            <!-- Form đăng nhập -->
            <form action="login_process.php" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
