<?php
// Include the database connection file (config.php)
require_once(__DIR__ . '/../config.php'); // Include database connection

$currentDate = date("Y-m-d");

// Fetch upcoming competitions from the database
$queryUpcoming = "SELECT * FROM marathon WHERE Date > '$currentDate'ORDER BY Date DESC";
$resultUpcoming = $conn->query($queryUpcoming);
// Fetch past competitions from the database
$queryPast = "SELECT * FROM marathon WHERE Date <= '$currentDate'";
$resultPast = $conn->query($queryPast);
// Fetch upcoming competitions
if ($resultUpcoming->num_rows > 0) {
    echo "<h2 class='mt-4 text-center'>Upcoming Competitions</h2>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-hover'>";
    echo "<thead>
            <tr>
                <th>Competition ID</th>
                <th>Competition Name</th>
                <th>Time of Event</th>
                <th>Register</th>
            </tr>
          </thead>";
    echo "<tbody>";

    while ($row = $resultUpcoming->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['MarathonID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['RaceName']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
        echo "<td>
                <button class='btn btn-primary' onclick=\"RegisterParticipant(" . $row['MarathonID'] . ")\">
                    Register
                </button>
              </td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

// Fetch past competitions
if ($resultPast->num_rows > 0) {
    echo "<h2 class='mt-5 text-center'>Past Competitions</h2>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-hover'>";
    echo "<thead>
            <tr>
                <th>Competition ID</th>
                <th>Competition Name</th>
                <th>Time of Event</th>
                <th>Results</th>
            </tr>
          </thead>";
    echo "<tbody>";

    while ($row = $resultPast->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['MarathonID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['RaceName']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
        echo "<td>
                <a href='view_result.php?marathon_id=" . $row['MarathonID'] . "' class='btn btn-primary'>
                    View
                </a>
              </td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

echo "<script>
    function RegisterParticipant(entryNumber) {
        if (confirm('Are you sure you want to register for this competition?')) {
            window.location.href = 'regit_competition.php?id=' + entryNumber;
        }
    }
</script>";
?>