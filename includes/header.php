<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanoi International Marathon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="page-background">
    <div class="overlay"></div> <!-- Lớp overlay -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid"> <!-- Sử dụng container-fluid để căn full width -->
            <!-- Logo + Brand -->
            <a class="navbar-brand d-flex align-items-center" href="/final-exam">
                <img src="./assets/img/logo-nav.png" alt="Logo" class="logo-img me-2">
                Hanoi Marathon
            </a>
            <!-- Toggler button cho mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links và Buttons -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="user/show_competition.php">Competition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-warning me-2" href="/final-exam/login.php">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning" href="register.php">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
