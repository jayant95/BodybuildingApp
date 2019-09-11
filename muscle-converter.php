<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require("includes/helper_functions.php");

  $resultMeasurement = NULL;
  $validationError = NULL;
  $bodybuilderNames = getBodybuilderNames($connection);

  if (isset($_POST['convert'])) {
    $bodybuilder['nameCode'] = !empty($_POST['bodybuilder-name']) ? $_POST['bodybuilder-name'] : "";
    $bodybuilder['fromMuscle'] = !empty($_POST['from-muscle']) ? $_POST['from-muscle'] : "";
    $bodybuilder['resultMuscle'] = !empty($_POST['result-muscle']) ? $_POST['result-muscle'] : "";
    $measurementSize = !empty($_POST['measurement-size']) ? $_POST['measurement-size'] : "";

    if (is_numeric($measurementSize)) {
      $muscleRatio = getBodybuilderMuscleRatio($bodybuilder, $connection);
      $resultMeasurement = $measurementSize / $muscleRatio;
    } else {
      $validationError = "Please enter a valid measurement";
    }
  }
?>

<div class="content-wrapper">
  <form class="muscle-converter-form" action="#" method="post">
    <div>
      <label>Bodybuilder Ratio</label>
      <select name="bodybuilder-name">
        <?php
          foreach ($bodybuilderNames as $nameKey => $name) {
            if ($nameKey == $bodybuilder['nameCode']) {
              echo "<option value=" . $nameKey . " selected>" . $name . "</option>";
            } else {
              echo "<option value=" . $nameKey . ">" . $name . "</option>";
            }
          }
        ?>
      </select>
    </div>

    <label>From:</label>
    <select name="from-muscle">
      <?php
        $muscleGroup = [
          "arms" => "Arms",
          "chest" => "Chest",
          "waist" => "Waist",
          "thighs" => "Legs",
          "calves" => "Calves",
        ];

        foreach ($muscleGroup as $key => $value) {
          if ($key == $bodybuilder['fromMuscle']) {
            echo "<option value=" . $key . " selected>" . $value . "</option>";
          } else {
            echo "<option value=" . $key . ">" . $value . "</option>";
          }
        }
      ?>
    </select>
    <div>
    <input class="muscle-input" name="measurement-size" step="0.01" type="number" value="<?php echo $measurementSize ?>">
    <?php if (isset($validationError)) {  echo "<span class='validation-error'>" . $validationError . "</span>"; } ?>
    </div>
    <label>To:</label>
    <select name="result-muscle">
      <?php
        foreach ($muscleGroup as $key => $value) {
          if ($key == $bodybuilder['resultMuscle']) {
            echo "<option value=" . $key . " selected>" . $value . "</option>";
          } else {
            echo "<option value=" . $key . ">" . $value . "</option>";
          }
        }
      ?>
    </select>

    <?php
      if ($resultMeasurement) {
        echo "<p>Size: " . round($resultMeasurement, 3) . "</p>";
      }
    ?>

    <input class="login-button" type="submit" name="convert" value="Convert"/>
  </form>

</div>

<?php require("includes/footer.php") ?>
