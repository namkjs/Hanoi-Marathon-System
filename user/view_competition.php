<?php
session_start();
require_once(__DIR__ . '/../config.php'); // Include database connection

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get username and userID
$username = $_SESSION['username'];
$query_user = "SELECT UserID FROM User WHERE Username='$username'";
$result_user = $conn->query($query_user);

if ($result_user && $result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    $userID = $row_user['UserID'];
} else {
    echo "Error: User not found.";
    exit();
}
include('../includes/loggedin.php');

// Get entry number and marathon ID from URL parameters
$entryNo = $_GET['entry_no'];
$marathonID = $_GET['marathon_id'];

// Validate entry number and marathon ID
if (!is_numeric($entryNo) || !is_numeric($marathonID)) {
    echo "Invalid entry or marathon ID.";
    exit();
}

// Query to get competition details and user's participation info
$query = "SELECT marathon.*, participate.*, 
participant.Name, participant.Nationality, participant.Sex, participant.Age, participant.Email, participant.Phone, participant.Address
FROM marathon
INNER JOIN participate ON marathon.MarathonID = participate.MarathonID
INNER JOIN participant ON participate.UserID = participant.UserID
WHERE participate.EntryNO = $entryNo
AND participate.MarathonID = $marathonID";

$result = $conn->query($query);
?>


<?php
// Display competition details using Bootstrap classes
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <?php
} else {
    echo "<div class='container mt-5'>No information found for this competition.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Competition Details</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(to bottom, #e0f7fa, #ffffff);
      font-family: 'Poppins', sans-serif;
    }

    .section-title {
      font-weight: bold;
      color: #333;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 15px;
    }

    .card-custom {
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      background-color: #fff;
      overflow: hidden;
    }

    .card-custom:hover {
      transform: translateY(-10px);
      transition: transform 0.3s ease-in-out;
    }

    .gradient-custom {
      background: linear-gradient(to right, #4a90e2, #56ccf2);
      color: #fff;
      padding: 15px;
      text-align: center;
    }

    .gradient-custom h2 {
      margin: 0;
    }

    .info-block h6 {
      font-weight: bold;
      color: #4a90e2;
    }

    .info-block p {
      color: #333;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<!-- Container -->
<div class="container my-5">
  <div class="row justify-content-center">
    <!-- Competition Information -->
    <div class="col-md-10 mb-4">
      <div class="card card-custom">
        <div class="gradient-custom">
          <h2>Competition Information</h2>
        </div>
        <div class="card-body">
          <div class="row info-block">
            <div class="col-md-4">
              <h6>Competition ID</h6>
              <p><?= $row['MarathonID'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Competition Name</h6>
              <p><?= $row['RaceName'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Date</h6>
              <p><?= $row['Date'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- User Information -->
    <div class="col-md-10 mb-4">
      <div class="card card-custom">
        <div class="gradient-custom">
          <h2>User Information</h2>
        </div>
        <div class="card-body">
          <div class="row info-block">
            <div class="col-md-4">
              <h6>Name</h6>
              <p><?= $row['Name'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Email</h6>
              <p><?= $row['Email'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Phone</h6>
              <p><?= $row['Phone'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Gender</h6>
              <p><?= $row['Sex'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Age</h6>
              <p><?= $row['Age'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Address</h6>
              <p><?= $row['Address'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Participation Information -->
    <div class="col-md-10">
      <div class="card card-custom">
        <div class="gradient-custom">
          <h2>Participation Information</h2>
        </div>
        <div class="card-body">
          <div class="row info-block">
            <div class="col-md-4">
              <h6>Entry Number</h6>
              <p><?= $row['EntryNO'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Hotel</h6>
              <p><?= $row['Hotel'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Time Record</h6>
              <p><?= $row['TimeRecord'] ?></p>
            </div>
            <div class="col-md-4">
              <h6>Standings</h6>
              <p><?= $row['Standings'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
