<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanoi International Marathon</title>
    <link rel="stylesheet" href="assets/css/home.css">

</head>

<body>

<?php
session_start();

if (isset($_SESSION['username'])) {
    include('./includes/loggedin.php');
} else {
    include('./includes/header.php');
}
?>

<!-- Nội dung trang -->
<div class="background">
    <div class="overlay"></div> <!-- Lớp nền mờ -->
    <div class="content">
        <h1>Hanoi International Marathon</h1> <!-- Chữ nổi bật -->
    </div>
</div>


</body>

</html>