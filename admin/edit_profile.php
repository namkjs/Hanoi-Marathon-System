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

// Lấy thông tin người dùng từ bảng participant
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
} else {
    $name = $nationality = $sex = $age = $marathon_best_record = $passport_no = $address = $email = $phone = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #4a90e2;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #357abd;
            transform: scale(1.02);
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="number"], input[type="tel"], select {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include('../includes/loggedin_admin.php'); ?>

    <div class="container">
        <h1>Edit Profile</h1>
        <form action="update_profile.php" method="post" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>

            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality:</label>
                <input type="text" id="nationality" name="nationality" class="form-control" value="<?php echo htmlspecialchars($nationality); ?>" required>
            </div>

            <div class="mb-3">
                <label for="sex" class="form-label">Gender:</label>
                <select id="sex" name="sex" class="form-select">
                    <option value="Male" <?php if ($sex == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($sex == 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($sex == 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" id="age" name="age" class="form-control" value="<?php echo htmlspecialchars($age); ?>" required>
            </div>

            <div class="mb-3">
                <label for="marathon_best_record" class="form-label">Marathon Best Record:</label>
                <input type="text" id="marathon_best_record" name="marathon_best_record" class="form-control" value="<?php echo htmlspecialchars($marathon_best_record); ?>">
            </div>

            <div class="mb-3">
                <label for="passport_no" class="form-label">Passport No:</label>
                <input type="text" id="passport_no" name="passport_no" class="form-control" value="<?php echo htmlspecialchars($passport_no); ?>">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo htmlspecialchars($address); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
        </form>
    </div>

</body>
</html>
