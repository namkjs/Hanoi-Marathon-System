<?php
// Include the database connection file
require_once(__DIR__ . '/../config.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $competition_id = $_GET['id'];

    // Xóa dữ liệu liên quan trong bảng `participate` trước
    $delete_participate_query = "DELETE FROM participate WHERE MarathonID = '$competition_id'";
    if ($conn->query($delete_participate_query) === TRUE) {
        // Sau đó xóa cuộc thi trong bảng `marathon`
        $delete_marathon_query = "DELETE FROM marathon WHERE MarathonID = '$competition_id'";
        if ($conn->query($delete_marathon_query) === TRUE) {
            header("Location: show_competition.php");
            exit();
        } else {
            echo "Error deleting competition: " . $conn->error;
        }
    } else {
        echo "Error deleting related participants: " . $conn->error;
    }
} else {
    echo "No competition ID provided";
}
?>
