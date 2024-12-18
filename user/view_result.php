<?php
// Include the database connection file (config.php)
require_once(__DIR__ . '/../config.php'); // Include database connection

// Kiểm tra nếu không có ID cuộc thi được chuyển từ trang trước
if (!isset($_GET['marathon_id'])) {
    echo "Missing marathon ID.";
    exit();
} else {
    $marathonID = $_GET['marathon_id'];
}

// Lấy thông tin cơ bản của người tham gia cuộc thi từ bảng Participants
$query = "SELECT participate.EntryNO, participant.Name, participate.TimeRecord, participate.Standings 
          FROM participate 
          INNER JOIN participant ON participate.UserID = participant.UserID 
          WHERE participate.MarathonID = $marathonID 
          ORDER BY participate.Standings ASC"; // Sắp xếp theo thứ tự đến đích

$result = $conn->query($query);
include('../includes/loggedin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Results</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        /* General Body Styling */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #e0f7fa, #f1f8e9); /* Nền gradient nhẹ */
            min-height: 100vh; /* Đảm bảo full chiều cao */
        }

        /* Wrapper để căn bảng giữa trang */
        .table-wrapper {
            display: block;
            margin: 50px auto; /* Căn giữa theo chiều ngang */
            max-width: 1100px; /* Giới hạn chiều rộng */
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Header Table */
        .table thead {
            background: linear-gradient(to right, #4a90e2, #56ccf2);
            color: white;
        }

        /* Hiệu ứng hover cho bảng */
        .table tbody tr:hover {
            background-color: #f1f8e9;
            cursor: pointer;
        }

        /* Căn giữa nội dung bảng */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>

<!-- Thanh Navbar -->

<!-- Wrapper chứa bảng -->
<div class="table-wrapper">
    <h2 class="text-center mb-4">Participant Results</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Entry Number</th>
                    <th>Name</th>
                    <th>Time Record</th>
                    <th>Standings</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['EntryNO']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['TimeRecord'] ? $row['TimeRecord'] : 'N/A'; ?></td>
                        <td><?php echo $row['Standings'] ? $row['Standings'] : 'N/A'; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
