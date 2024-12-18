<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Hanoi International Marathon</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Overlay mờ */
    .overlay {
      background-color: rgba(0, 0, 0, 0.4);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
    }

    /* Navbar làm mờ */
    .navbar {
      background-color: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      z-index: 2;
    }

    /* Logo trong navbar */
    .logo-img {
      height: 50px;
      width: auto;
      transition: transform 0.3s ease-in-out;
    }

    .navbar-brand {
      font-size: 26px;
      font-weight: bold;
      color: #ffffff;
      display: flex;
      align-items: center;
      transition: color 0.3s ease, transform 0.3s ease-in-out;
    }

    .navbar-brand:hover {
      color: #ffc107;
      transform: scale(1.05);
    }

    .navbar-brand:hover .logo-img {
      transform: scale(1.5);
    }

    /* Navbar Links */
    .navbar-nav .nav-link {
      color: #f1f1f1;
      font-size: 18px;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #ffc107;
      transform: translateY(-2px);
    }

    /* Dropdown */
    .dropdown-menu {
      background-color: #333;
      border: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    .dropdown-item {
      color: #fff;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown-item:hover {
      background-color: #ffc107;
      color: #333;
    }

    /* Search Input */
    .form-control {
      border-radius: 20px;
      transition: box-shadow 0.3s ease-in-out;
    }

    .form-control:focus {
      box-shadow: 0 0 10px #ffc107;
      border-color: #ffc107;
    }

    .btn-outline-success {
      color: #ffc107;
      border-color: #ffc107;
      transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
      background-color: #ffc107;
      color: #333;
    }

    /* Responsive chỉnh sửa */
    @media (max-width: 992px) {
      .navbar-nav {
        text-align: center;
      }

      .btn-outline-success {
        display: block;
        margin: 5px auto;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/final-exam">
        Hanoi International Marathon
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar Menu -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/final-exam">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_competition.php">Competition</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About us</a>
          </li>
        </ul>

        <!-- User Dropdown và Search -->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Username
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
              <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="create_logout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul>

        <form class="d-flex ms-3">
          <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
