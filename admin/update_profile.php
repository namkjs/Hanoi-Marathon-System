<?php
session_start();
require_once(__DIR__ . '/../config.php'); // Kết nối cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];

    // Lấy UserID từ bảng user dựa vào username
    $queryUser = "SELECT UserID FROM user WHERE Username = ?";
    $stmtUser = $conn->prepare($queryUser);
    $stmtUser->bind_param("s", $username);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    if ($resultUser->num_rows > 0) {
        $row = $resultUser->fetch_assoc();
        $userID = $row['UserID'];

        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $nationality = $_POST['nationality'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $marathon_best_record = $_POST['marathon_best_record'];
        $passport_no = $_POST['passport_no'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Kiểm tra xem người dùng đã có hồ sơ trong bảng participant chưa
        $queryCheck = "SELECT * FROM participant WHERE UserID = ?";
        $stmtCheck = $conn->prepare($queryCheck);
        $stmtCheck->bind_param("i", $userID);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // Nếu đã có hồ sơ, thực hiện cập nhật thông tin
            $queryUpdate = "UPDATE participant 
                            SET Name = ?, Nationality = ?, Sex = ?, Age = ?, BestRecord = ?, PassportNO = ?, Address = ?, Email = ?, Phone = ?
                            WHERE UserID = ?";
            $stmtUpdate = $conn->prepare($queryUpdate);
            $stmtUpdate->bind_param("sssssssssi", $name, $nationality, $sex, $age, $marathon_best_record, $passport_no, $address, $email, $phone, $userID);

            if ($stmtUpdate->execute()) {
                $_SESSION['success'] = "Profile updated successfully!";
            } else {
                $_SESSION['error'] = "Error updating profile: " . $conn->error;
            }
        } else {
            // Nếu chưa có hồ sơ, thêm mới vào bảng participant
            $queryInsert = "INSERT INTO participant (UserID, Name, Nationality, Sex, Age, BestRecord, PassportNO, Address, Email, Phone) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtInsert = $conn->prepare($queryInsert);
            $stmtInsert->bind_param("isssssssss", $userID, $name, $nationality, $sex, $age, $marathon_best_record, $passport_no, $address, $email, $phone);

            if ($stmtInsert->execute()) {
                $_SESSION['success'] = "Profile created successfully!";
            } else {
                $_SESSION['error'] = "Error creating profile: " . $conn->error;
            }
        }
    } else {
        $_SESSION['error'] = "User not found.";
    }

    header("Location: edit_profile.php"); // Quay lại trang chỉnh sửa hồ sơ
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: edit_profile.php");
    exit();
}
?>
