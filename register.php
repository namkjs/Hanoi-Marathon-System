<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body class="register-page">
    <?php include('includes/navbar.php'); ?>

    <!-- Container chính -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card register-card p-4">
            <!-- Tiêu đề -->
            <div class="text-center mb-3">
                <h2 class="fw-bold">Create an Account</h2>
                <p class="text-muted">Join us and start your race!</p>
            </div>
            
            <!-- Thông báo PHP -->
            <?php
            require_once(__DIR__ . '/config.php'); // Include database connection

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Check if the username already exists
                $checkUserQuery = "SELECT Username FROM User WHERE Username = '$username'";
                $checkResult = $conn->query($checkUserQuery);

                if ($checkResult->num_rows > 0) {
                    echo "<p class='alert alert-danger'>Username '$username' has already been registered.</p>";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $insertUserQuery = "INSERT INTO User (Username, Password, is_admin) VALUES ('$username', '$hashed_password', FALSE)";
                    $result = $conn->query($insertUserQuery);

                    if ($result) {
                        echo "<p class='alert alert-success'>Registration successful! You can now log in.</p>";
                    } else {
                        echo "<p class='alert alert-danger'>Error: " . $conn->error . "</p>";
                    }
                }
            }
            ?>

            <!-- Form đăng ký -->
            <form action="register.php" method="post">
                <div class="form-floating mb-3">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
