<?php
session_start();
require_once(__DIR__ . '/../config.php'); // Include database connection

// Kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}

$username = $_SESSION['username'];

// Lấy UserID của người dùng đăng nhập
$query_user = "SELECT UserID FROM User WHERE Username='$username'";
$result_user = $conn->query($query_user);

if ($result_user && $result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    $userID = $row_user['UserID'];

    // Lấy danh sách cuộc thi mà UserID đã đăng ký tham gia từ bảng Participate
    $query = "SELECT marathon.MarathonID, marathon.RaceName, marathon.Date, participate.EntryNO 
              FROM marathon 
              INNER JOIN participate ON marathon.MarathonID = participate.MarathonID 
              WHERE participate.UserID = $userID";

    $result = $conn->query($query);
}
// ... (Previous code remains the same)
include('../includes/loggedin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Competitions</title>
    <!-- Bootstrap 5 -->
    <!-- Font Awesome -->
    <style>
        body {
            background: linear-gradient(to bottom, #f0f4f8, #ffffff);
            font-family: 'Poppins', sans-serif;
        }
        .section-title {
            font-weight: 600;
            color: #333;
            margin: 20px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background-color: white;
        }

        .table-custom thead {
            background: linear-gradient(to right, #4a90e2, #56ccf2);
            color: white;
        }

        .table-custom tbody tr:hover {
            background-color: #f1f9ff;
            cursor: pointer;
        }

        .btn-danger, .btn-primary {
            transition: all 0.3s ease;
        }

        .btn-danger:hover, .btn-primary:hover {
            transform: scale(1.05);
        }

        .highlight-row {
            background-color: #f0f4ff;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="section-title text-center">List of Competitions</h2>

    <!-- Upcoming Competitions -->
    <div class="mb-4">
        <h3 class="section-title">Upcoming Competitions</h3>
        <div class="table-responsive">
            <table class="table table-custom table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>Competition ID</th>
                        <th>Competition Name</th>
                        <th>Date</th>
                        <th>Cancel Registration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $currentDate = date('Y-m-d');
                    $result->data_seek(0); // Reset pointer
                    while ($row = $result->fetch_assoc()) :
                        if ($row['Date'] >= $currentDate) : ?>
                            <tr>
                                <td><?= $row['MarathonID'] ?></td>
                                <td><?= $row['RaceName'] ?></td>
                                <td><?= $row['Date'] ?></td>
                                <td>
                                    <a href="cancel_registration.php?entry_no=<?= $row['EntryNO'] ?>&marathon_id=<?= $row['MarathonID'] ?>" 
                                       class="btn btn-danger btn-sm">
                                       <i class="fas fa-times-circle"></i> Cancel
                                    </a>
                                </td>
                            </tr>
                        <?php endif;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Past Competitions -->
    <div class="mb-4">
        <h3 class="section-title">Past Competitions</h3>
        <div class="table-responsive">
            <table class="table table-custom table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>Competition ID</th>
                        <th>Competition Name</th>
                        <th>Date</th>
                        <th>View Competition</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result->data_seek(0); // Reset pointer
                    while ($row = $result->fetch_assoc()) :
                        if ($row['Date'] < $currentDate) : ?>
                            <tr>
                                <td><?= $row['MarathonID'] ?></td>
                                <td><?= $row['RaceName'] ?></td>
                                <td><?= $row['Date'] ?></td>
                                <td>
                                    <a href="view_competition.php?entry_no=<?= $row['EntryNO'] ?>&marathon_id=<?= $row['MarathonID'] ?>" 
                                       class="btn btn-primary btn-sm">
                                       <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        <?php endif;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
</body>
</html>
