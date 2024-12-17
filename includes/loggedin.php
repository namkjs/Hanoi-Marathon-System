<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hanoi International Marathon</title>
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
    background-color: rgba(0, 0, 0, 0.6); /* Màu đen trong suốt */
    backdrop-filter: blur(10px); /* Hiệu ứng làm mờ nền */
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    z-index: 2;
}

/* Logo trong navbar */
.logo-img {
    height: 50px; /* Điều chỉnh kích thước logo */
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
    color: #ffc107; /* Đổi màu vàng khi hover */
    transform: scale(1.05); /* Phóng to nhẹ khi hover */
}

.navbar-brand:hover .logo-img {
    transform: scale(1.5); /* Logo cũng phóng to nhẹ */
}

/* Navbar Links */
.navbar-nav .nav-link {
    color: #f1f1f1;
    font-size: 18px;
    transition: color 0.3s ease, transform 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #ffc107;
    transform: translateY(-2px); /* Nhảy nhẹ */
}

/* Nút Sign in và Sign up */
.btn-warning {
    background-color: #ffc107;
    color: #333;
    font-weight: bold;
    border-radius: 20px;
    transition: all 0.3s ease-in-out;
    padding: 6px 15px;
}

.btn-warning:hover {
    background-color: #e0a800;
    color: #fff;
    transform: translateY(-2px); /* Nhảy nhẹ */
}

/* Responsive chỉnh sửa */
@media (max-width: 992px) {
    .navbar-nav {
        text-align: center;
    }

    .btn-warning {
        display: block;
        margin: 5px auto;
    }
}

    </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/final-exam">Hanoi International Marathon</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Username
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="view_profile.php">Personal Information</a></li>
              <li><a class="dropdown-item" href="edit_profile.php">Edit Personal Information</a></li>
              <li><a class="dropdown-item" href="list_competition.php">List Competition</a></li>
              <li><a class="dropdown-item" href="create_logout.php">Sign out</a></li>
            </ul>
          </li>
        </ul>

            <!-- Update the search form -->
            <form class="d-flex" action="search_competition.php" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
