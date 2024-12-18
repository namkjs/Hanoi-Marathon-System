<?php
// Include the database connection file
require_once(__DIR__ . '/../config.php');

// Check if marathon ID is passed
if (!isset($_GET['marathon_id']) || empty($_GET['marathon_id'])) {
    echo "Missing marathon ID.";
    exit();
} else {
    $marathonID = $_GET['marathon_id'];
}

// SQL Query with Proper Sorting (Cast Standings to Integer)
$query = "SELECT participate.EntryNO, participant.Name, participate.TimeRecord, participate.Standings 
          FROM participate 
          INNER JOIN participant ON participate.UserID = participant.UserID 
          WHERE participate.MarathonID = ?
          ORDER BY CAST(participate.Standings AS UNSIGNED) ASC";

// Prepare and Execute Query
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $marathonID);
$stmt->execute();
$result = $stmt->get_result();

include('../includes/loggedin.php'); // Include the Navbar or Login Header
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Results</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Body Styling */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #e0f7fa, #f1f8e9); /* Gradient Background */
            min-height: 100vh;
        }

        /* Wrapper to Center Table */
        .table-wrapper {
            display: block;
            margin: 50px auto;
            max-width: 1100px;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Table Header */
        .table thead {
            background: linear-gradient(to right, #4a90e2, #56ccf2);
            color: white;
        }

        /* Hover Effect */
        .table tbody tr:hover {
            background-color: #f1f8e9;
            cursor: pointer;
        }

        /* Center Table Content */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        /* Heading */
        h2 {
            color: #4a90e2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->

    <!-- Table Wrapper -->
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
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['EntryNO']); ?></td>
                                <td><?php echo htmlspecialchars($row['Name']); ?></td>
                                <td><?php echo $row['TimeRecord'] ? htmlspecialchars($row['TimeRecord']) : 'N/A'; ?></td>
                                <td><?php echo $row['Standings'] ? htmlspecialchars($row['Standings']) : 'N/A'; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">No results found for this competition.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
