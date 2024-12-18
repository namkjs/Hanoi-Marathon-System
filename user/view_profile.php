<?php
session_start();
require_once(__DIR__ . '/../config.php'); // Include database connection

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}


$username = $_SESSION['username'];
$id = "SELECT * FROM user WHERE username = '$username'";
$result = $conn->query($id);
$row = $result->fetch_assoc();
$userID = $row['UserID'];
// Lấy thông tin người dùng từ cơ sở dữ liệu
$query = "SELECT * FROM participant WHERE UserID= '$userID'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['Name'];
    $nationality = $row['Nationality'];
    $sex = $row['Sex'];
    $age = $row['Age'];
    $marathon_best_record = $row['BestRecord'];
    $passport_no = $row['PassportNO'];
    $address = $row['Address'];
    $email = $row['Email'];
    $phone = $row['Phone'];
    // Thêm các trường thông tin khác từ bảng Participant
} else {
    // Hiển thị form để người dùng nhập thông tin mới
    $name = '';
    $nationality = '';
    $sex = '';
    $age = '';
    $marathon_best_record = '';
    $passport_no = '';
    $address = '';
    $email = '';
    $phone = '';
    // Khai báo các trường thông tin khác với giá trị rỗng
}

// Hiển thị form chỉnh sửa thông tin cá nhân
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Background gradient */
        body {
            background: linear-gradient(to bottom, #e0f7fa, #f1f8e9);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        /* Card profile */
        .profile-card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background: #ffffff;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .profile-card:hover {
            transform: translateY(-10px);
        }

        /* Left gradient section */
        .profile-card .gradient-custom {
            background: linear-gradient(to bottom right, #4a90e2, #56ccf2);
            color: #fff;
            text-align: center;
            padding: 30px;
        }

        .profile-card .gradient-custom img {
            border-radius: 50%;
            width: 100px;
            margin-bottom: 15px;
            border: 4px solid #ffffff;
        }

        /* Information section */
        .info-card h6 {
            font-weight: bold;
            color: #333;
        }

        .info-card p {
            color: #666;
            margin-bottom: 10px;
        }

        /* Social icons */
        .social-icons a {
            color: #4a90e2;
            font-size: 1.2rem;
            transition: color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .social-icons a:hover {
            color: #56ccf2;
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <?php include('../includes/loggedin.php'); ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card profile-card">
                    <div class="row g-0">
                        <!-- Left Section -->
                        <div class="col-md-4 gradient-custom d-flex flex-column align-items-center justify-content-center">
                            <img src="./assets/img/avatar.png" alt="Avatar" />
                            <h4 class="mb-0"><?php echo $name; ?></h4>
                            <p class="mb-4"><?php echo $nationality; ?></p>
                            <i class="fas fa-edit fa-lg"></i>
                        </div>

                        <!-- Right Section -->
                        <div class="col-md-8">
                            <div class="card-body p-4 info-card">
                                <h3 class="mb-4 text-center">Personal Information</h3>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h6>Email</h6>
                                        <p><?php echo $email; ?></p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Phone</h6>
                                        <p><?php echo $phone; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h6>Gender</h6>
                                        <p><?php echo $sex; ?></p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Age</h6>
                                        <p><?php echo $age; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h6>Best Record</h6>
                                        <p><?php echo $marathon_best_record; ?></p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Passport No</h6>
                                        <p><?php echo $passport_no; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h6>Address</h6>
                                        <p><?php echo $address; ?></p>
                                    </div>
                                </div>

                                <!-- Social Icons -->
                                <div class="social-icons d-flex justify-content-center">
                                    <a href="https://facebook.com" class="me-3"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com" class="me-3"><i class="fab fa-twitter"></i></a>
                                    <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Row -->
                </div> <!-- End Card -->
            </div>
        </div>
    </div>
</body>
</html>
