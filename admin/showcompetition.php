<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Competitions</title>
  <!-- Bootstrap 5 CSS -->
  <!-- Font Awesome Icons -->
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    h1 {
      font-weight: bold;
      color: #333;
      margin-bottom: 20px;
    }

    .container {
      margin-top: 30px;
    }

    .table th {
      background-color: #007bff;
      color: #fff;
      text-align: center;
    }

    .table td, .table th {
      text-align: center;
      vertical-align: middle;
    }

    .btn {
      transition: all 0.3s ease;
    }

    .btn-primary {
      background-color: #4a90e2;
      border: none;
    }

    .btn-primary:hover {
      background-color: #357abd;
      transform: scale(1.05);
    }

    .btn-danger {
      background-color: #e74c3c;
      border: none;
    }

    .btn-danger:hover {
      background-color: #c0392b;
      transform: scale(1.05);
    }

    .btn-success {
      background-color: #28a745;
      border: none;
    }

    .btn-success:hover {
      background-color: #218838;
      transform: scale(1.05);
    }

    .table-striped > tbody > tr:nth-of-type(odd) {
      background-color: #f1f3f5;
    }

    /* Hover row effect */
    .table-hover tbody tr:hover {
      background-color: #e2e6ea;
      transition: background-color 0.3s ease;
    }
  </style>
</head>

<body>

  <!-- Main Content -->
  <div class="container">
    <h1 class="text-center">List of Competitions</h1>
    <hr>
    <?php
      require_once(__DIR__ . '/../config.php');

      $query = "SELECT * FROM marathon ORDER BY Date DESC";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped table-hover'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Competition ID</th>";
        echo "<th scope='col'>Competition Name</th>";
        echo "<th scope='col'>Time of Event</th>";
        echo "<th scope='col'>Edit</th>";
        echo "<th scope='col'>Delete</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['MarathonID'] . "</td>";
          echo "<td>" . $row['RaceName'] . "</td>";
          echo "<td>" . $row['Date'] . "</td>";
          echo "<td><a href='edit_competition.php?id=" . $row['MarathonID'] . "' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i> Edit</a></td>";
          echo "<td><a href='delete_competition.php?id=" . $row['MarathonID'] . "' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Delete</a></td>";
          echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        echo "</div>";
      } else {
        echo "<div class='alert alert-warning text-center'>No competitions found.</div>";
      }
      echo "<div class='text-center mt-4'>";
      echo "<a href='registation_form.php' class='btn btn-success btn-lg'><i class='fas fa-plus'></i> Register a Competition</a>";
    ?>
  </div>

  <!-- Bootstrap Bundle with Popper -->
</body>

</html>
