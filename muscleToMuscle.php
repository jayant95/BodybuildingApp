<?php
  session_start();
  require("includes/header.php");
  require("includes/db_connection.php");
  require("includes/helper_functions.php");

  if (isset($_POST['convert'])) {
    $bodybuilder['name'] = !empty($_POST['bodybuilder-name']) ? $_POST['bodybuilder-name'] : "";
    $bodybuilder['fromMuscle'] = !empty($_POST['from-muscle']) ? $_POST['from-muscle'] : "";
    $bodybuilder['resultMuscle'] = !empty($_POST['result-muscle']) ? $_POST['result-muscle'] : "";

    //$bodybuilderStats = getBodybuilderStats($bodybuilder, $connection);
    $muscleRatio = getBodybuilderMuscleRatio($bodybuilder, $connection);
    $measurementSize = !empty($_POST['measurement-size']) ? $_POST['measurement-size'] : "";
    $resultMeasurement = $measurementSize / $muscleRatio;
  }
?>

<form class="muscle-converter-form" action="#" method="post">
  <div>
    <label>Bodybuilder Ratio</label>
    <select name="bodybuilder-name">
      <option value="Schwarzenegger">Arnold Schwarzenegger</option>
      <option value="Zane">Frank Zane</option>
      <option value="Columbo">Franco Columbo</option>
      <option value="Ferrigno">Lou Ferrigno</option>
      <option value="Nubret">Serge Nubret</option>
      <option value="Haney">Lee Haney</option>
    </select>
  </div>

  <label>From:</label>
  <select name="from-muscle">
    <option value="arms">Arms</option>
    <option value="chest">Chest</option>
    <option value="waist">Waist</option>
    <option value="thighs">Legs</option>
    <option value="calves">Calves</option>
  </select>
  <input class="muscle-input" name="measurement-size" type="number">

  <label>To:</label>
  <select name="result-muscle">
    <option value="arms">Arms</option>
    <option value="chest">Chest</option>
    <option value="waist">Waist</option>
    <option value="thighs">Legs</option>
    <option value="calves">Calves</option>
  </select>

  <?php
    if ($resultMeasurement) {
      echo "<p>Size: " . round($resultMeasurement, 3) . "</p>";
    }
   ?>

  <input class="login-button" type="submit" name="convert" value="Convert"/>
</form>


<?php require("includes/footer.php") ?>
