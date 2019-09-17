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

<div class="page-background">
  <div class="content-wrapper">
    <div class="feature-info">
        <h2>Muscle to Muscle Calculator</h2>
        <p>Select your body part of choice with a measurement, a bodybuilder, and the desired muscle group.
        </p>
    </div>
    
    <form class="muscle-converter-form" action="#" method="post">
      <h2 class="form-header">Muscle Converter</h2>
        <div class="wrap-input">
          <label class="input-label">Bodybuilder Ratio</label>
          <select class="form-input" name="bodybuilder-name">
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

      <div class="wrap-input">
        <label class="input-label">From:</label>
        <select class="form-input" name="from-muscle">
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
      </div>
      <div class="wrap-input">
        <label class="input-label">Size:</label>
        <input class="form-input" name="measurement-size" step="0.01" type="number" value="<?php echo $measurementSize ?>">
        <?php if (isset($validationError)) {  echo "<span class='validation-error'>" . $validationError . "</span>"; } ?>
      </div>
      <div class="wrap-input">
        <label class="input-label">To:</label>
        <select class="form-input" name="result-muscle">
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
      </div>
      <?php
        if ($resultMeasurement) {
          echo "<p>Size: " . round($resultMeasurement, 3) . "</p>";
        }
      ?>

      <input class="login-button" type="submit" name="convert" value="Convert"/>
    </form>
    <div class="feature-info details">
        <h3>Walkthrough example</h3>
        <p>User selects Arnold Schwarzenegger for his muscle proportions for those muscle groups</p>
        <p>User selects Thighs</p>
        <p>User enters their Thigh size, 23 inches</p>
        <p>User wants to see their ideal calf size</p>
        <p>Click convert to see ideal calf size</p>
        <p>------------------------------------------------------------------</p>
        <p>Arnold: 28in (thighs) / 20in (calves) = 1.425 (ratio)</p>
        <p>User: 23in (thighs) * 1.425 (Arnolds ratio) = 16.14in</p>
        <p>Using Arnold Schwarzenegger's muscle ratio the ideal calf size for the user is 16.14in with 23in thighs</p>
    </div>
  </div>
  <?php require("includes/navigation_bottom.php"); ?>
</div>

<?php require("includes/footer.php") ?>
