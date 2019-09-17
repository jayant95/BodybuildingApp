<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require("includes/helper_functions.php");

  echo "<div class='page-background'>";
    echo "<div class='content-wrapper'>";
      echo "<div class='user-stats'>";

      echo "<h2>Golden Ratio</h2>";

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
        <input class='login-button' type='submit' name='update' value='Update Goal'>
      </form>
    </div>
    <div class="feature-info">
      <p>In bodybuilding, the golden ratio is the epitome of a timeless physique by combining perfect proportions,
        while maintaing a muscular size with a low body fat percentage, achieving the most universally admirable physique. This ratio is seen in other areas of life such as nature and art.</p>
      <p>The golden ratio is 1.618 and has criteria that follows:</p> 
      <p>- Arm flexed = 150% bigger than non-dominant wrist (2.5x)<p> 
      <p>- Flexed arms = flexed calves<p> 
      <p>- Shoulder circumference = waist * 1.618<p> 
      <p>- Chest circumference = 550% bigger than non-dominant wrist (6.5x)<p> 
      <p>- Upper thigh circumference = 75% bigger than circumference of knee (1.75x)<p> 
      <p>**Golden ratio requires minimal body fat for correct proportions. Less than 10% body fat is ideal.<p> 


    </div>
  </div>
</div>



<?php require("includes/footer.php"); ?>
