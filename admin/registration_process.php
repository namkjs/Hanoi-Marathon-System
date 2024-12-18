<?php
session_start();
require_once(__DIR__ . '/../config.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $competitionID = $_POST['competition_id'];
    $competitionName = $_POST['competition_name'];
    $timeOfEvent = $_POST['time_of_event'];

    $dbImagePath = "../admin/assets/img/default.jpg"; // Default image path

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExtension, $allowedExtensions)) {
            // Generate unique image name
            $newImageName = uniqid("competition_", true) . '.' . $imageExtension;

            // Path to save file locally
            $uploadDirectory = __DIR__ . '/assets/img/';
            if (!is_dir($uploadDirectory)) mkdir($uploadDirectory, 0777, true);

            $imageFullPath = $uploadDirectory . $newImageName;

            // Move uploaded file
            if (move_uploaded_file($imageTmpPath, $imageFullPath)) {
                $dbImagePath = "../admin/assets/img/" . $newImageName;
                echo "Image uploaded: $dbImagePath";
            } else {
                $_SESSION['error'] = "Error moving uploaded file.";
                die("Error Path: " . $imageFullPath);
            }
        } else {
            $_SESSION['error'] = "Invalid file type.";
            die("File type not allowed: " . $imageExtension);
        }
    } else {
        echo "No file uploaded or upload error!";
    }

    // Insert into database
    $query = "INSERT INTO marathon (MarathonID, RaceName, Date, ImagePath) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $competitionID, $competitionName, $timeOfEvent, $dbImagePath);

    if ($stmt->execute()) {
        echo "Competition registered successfully!";
        $_SESSION['success'] = "Competition registered successfully!";
        header("Location: ./index.php");
        exit();
    } else {
        $_SESSION['error'] = "Database error: " . $stmt->error;
        die("SQL Error: " . $stmt->error);
    }
}

?>