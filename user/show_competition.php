<?php
session_start();

?>
<!DOCTYPE html>
<html>


<head>
    <title>List of Competitions</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = "You must log in to view the competitions."; // Thông báo lỗi
    header("Location: /final-exam/login.php"); 
    exit();
} ?>

<?php include('../includes/loggedin.php'); ?>
<?php       
    if (isset($_SESSION['success_message'])) {
        echo "<div class='alert alert-success' role='alert'>";
        echo $_SESSION['success_message'];
        echo "</div>";
        unset($_SESSION['success_message']);
      }

    if (isset($_SESSION['error_message'])) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo $_SESSION['error_message'];
        echo "</div>";
        unset($_SESSION['error_message']); // Clear error message from session
      }?>

    <h1>List of Competitions</h1>

    <div class="competition-list">
        <?php include('showcompetition.php'); ?>
    </div>
</body>
</html>