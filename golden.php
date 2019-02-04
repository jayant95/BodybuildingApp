<?php
  session_start();
  require("includes/header.php");
  require("includes/db_connection.php");
  require("includes/helper_functions.php");

  if (isset($_SESSION['username'])) {
    echo "<table class='ratio-table'>";
    echo "<tr>";
    echo "<th>Body Part</th>";
    echo "<th>Current</th>";
    echo "<th>Goal</th>";
    echo "<th>Difference</th>";
    echo "</tr>";

    $goldenBodyParts = getGoldenRatio($_SESSION['username'], $connection);
      foreach ($goldenBodyParts as $outerKey) {
        echo "<tr>";
        foreach ($outerKey as $innerKey => $innerValue) {
          echo "<td>" . $innerValue . "</td>";
        }
        echo "</tr>";
      }
    echo "</table>";
  } else {
    echo "<p>Please create an account and fill in the measurements in order to view your golden ratio</p>";
  }




require("includes/footer.php");
