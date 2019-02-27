<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
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

  if (isset($_POST['update'])) {
    $goal['waist'] = $goldenBodyParts['Waist']['Goal'];
    $goal['shoulders'] = $goldenBodyParts['Shoulders']['Goal'];
    $goal['chest'] = $goldenBodyParts['Chest']['Goal'];
    $goal['arms'] = $goldenBodyParts['Arm']['Goal'];
    $goal['calves'] = $goldenBodyParts['Calf']['Goal'];
    $goal['neck'] = $goldenBodyParts['Neck']['Goal'];
    $goal['thighs'] = $goldenBodyParts['Thigh']['Goal'];
    $goal['featureName'] = "Golden Ratio";
    $goal['memberID'] = $_SESSION['memberID'];
    $goal['currentGoal'] = 1;
    $goal['date'] = time();
    updateGoldenRatioGoal($goal, $connection);

    header("Location: profile.php");
  }
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<input class='profile-input' type='submit' name='update' value='Update Goal'>
</form>



<?php require("includes/footer.php"); ?>
