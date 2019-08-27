<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
?>

<div class="main-features">
  <div class="first-row-features">
    <div class="site-feature">
      <div class="feature-info-img by-height">
        <a href="pin-height.php">
          <img src="img/pinHeight.png">
        </a>
      </div>
      <div class="feature-info">
        <h2>Height</h2>
        <p>Choose a bodybuilder from the list and see your ideal measurements by height</p>
      </div>
    </div>
    <div class="site-feature">
      <div class="feature-info-img muscle-to-muscle">
        <a href="muscle-converter.php">
          <img src="img/muscleToMuscle.png">
        </a>
      </div>
      <div class="feature-info">
        <h2>Muscle to Muscle</h2>
        <p>Compare two muscle groups using this conversion calculator with different bodybuilders</p>
      </div>
    </div>
  </div>

  <div class="second-row-features">
    <div class="site-feature">
      <div class="feature-info-img pin-muscle">
        <a href="pin-muscle.php">
          <img src="img/pinMuscleGroup.png">
        </a>
      </div>
      <div class="feature-info">
        <h2>Pin Muscle Group</h2>
        <p>Choose a bodybuilder from the list and see your ideal measurements by height</p>
      </div>
    </div>
    <div class="site-feature">
      <div class="feature-info-img custom-feature">
        <a href="custom.php">
          <img src="img/customBody.png">
        </a>
      </div>
      <div class="feature-info">
        <h2>Custom</h2>
        <p>Create your own ideal measurements and stay on track</p>
      </div>
    </div>
    <div class="site-feature">
      <div class="feature-info-img golden-ratio">
        <a href="pin-height.php">
          <img src="img/goldenRatio.png">
        </a>
      </div>
      <div class="feature-info">
        <h2>Golden Ratio</h2>
        <p>Do you have the golden ratio physique? Come and find out</p>
      </div>
    </div>
  </div>
</div>


<?php require("includes/footer.php"); ?>
