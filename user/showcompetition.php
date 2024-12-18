<?php
// Include the database connection file (config.php)
require_once(__DIR__ . '/../config.php'); // Include database connection

$currentDate = date("Y-m-d");

// Fetch upcoming competitions from the database
$queryUpcoming = "SELECT * FROM marathon WHERE Date > '$currentDate' ORDER BY Date DESC";
$resultUpcoming = $conn->query($queryUpcoming);

// Fetch past competitions from the database
$queryPast = "SELECT * FROM marathon WHERE Date <= '$currentDate' ORDER BY Date DESC";
$resultPast = $conn->query($queryPast);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competitions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .competition-section {
            margin-top: 50px;
        }

        .competition-card {
            max-width: 300px;
            margin: 20px;
            text-align: center;
        }

        .competition-title {
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }

        .competition-date {
            font-size: 14px;
            color: #777;
            margin-top: 5px;
        }

        .competition-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .competition-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .modal-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Upcoming Competitions -->
    <?php if ($resultUpcoming->num_rows > 0): ?>
        <h2 class="text-center competition-section">Upcoming Competitions</h2>
        <div class="competition-container">
            <?php while ($row = $resultUpcoming->fetch_assoc()): ?>
                <div class="competition-card">
                    <img src="<?php echo htmlspecialchars($row['ImagePath']); ?>" alt="Competition Image" class="competition-image" data-bs-toggle="modal" data-bs-target="#infoModal" onclick="showInfo('<?php echo htmlspecialchars($row['ImagePath']); ?>', '<?php echo htmlspecialchars($row['RaceName']); ?>', '<?php echo htmlspecialchars($row['Date']); ?>', 'Register', <?php echo $row['MarathonID']; ?>)">
                    <div class="competition-title"><?php echo htmlspecialchars($row['RaceName']); ?></div>
                    <div class="competition-date">Date: <?php echo htmlspecialchars($row['Date']); ?></div>
                    <button class="btn btn-primary mt-2" onclick="RegisterParticipant(<?php echo $row['MarathonID']; ?>)">
                        Register
                    </button>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <!-- Past Competitions -->
    <?php if ($resultPast->num_rows > 0): ?>
        <h2 class="text-center competition-section">Past Competitions</h2>
        <div class="competition-container">
            <?php while ($row = $resultPast->fetch_assoc()): ?>
                <div class="competition-card">
                    <img src="<?php echo htmlspecialchars($row['ImagePath']); ?>" alt="Competition Image" class="competition-image" data-bs-toggle="modal" data-bs-target="#infoModal" onclick="showInfo('<?php echo htmlspecialchars($row['ImagePath']); ?>', '<?php echo htmlspecialchars($row['RaceName']); ?>', '<?php echo htmlspecialchars($row['Date']); ?>', 'View Results', <?php echo $row['MarathonID']; ?>)">
                    <div class="competition-title"><?php echo htmlspecialchars($row['RaceName']); ?></div>
                    <div class="competition-date">Date: <?php echo htmlspecialchars($row['Date']); ?></div>
                    <a href="view_result.php?marathon_id=<?php echo $row['MarathonID']; ?>" class="btn btn-primary mt-2">
                        View Results
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Modal for Competition Info -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">Competition Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Enlarged Image" class="modal-image">
                <h3 id="modalRaceName"></h3>
                <p id="modalRaceDate" class="text-muted"></p>
                <button id="modalActionButton" class="btn btn-primary"></button>
            </div>
        </div>
    </div>
</div>

<script>
    function showInfo(imagePath, raceName, raceDate, action, marathonID) {
        document.getElementById('modalImage').src = imagePath; // Set image
        document.getElementById('modalRaceName').innerText = raceName; // Set race name
        document.getElementById('modalRaceDate').innerText = "Date: " + raceDate; // Set date

        const button = document.getElementById('modalActionButton');
        button.innerText = action;

        if (action === 'Register') {
            button.setAttribute('onclick', `RegisterParticipant(${marathonID})`);
        } else {
            button.setAttribute('onclick', `window.location.href='view_result.php?marathon_id=${marathonID}'`);
        }
    }

    function RegisterParticipant(entryNumber) {
        if (confirm('Are you sure you want to register for this competition?')) {
            window.location.href = 'regit_competition.php?id=' + entryNumber;
        }
    }
</script>

</body>
</html>
