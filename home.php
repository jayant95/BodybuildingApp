<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
?>

<div class="main-features">
  <a href="pin-muscle.php">
    <div class="site-feature">
      <div class="pin-muscle-group">
        <div class="feature-info-img">
          <img src="img/pinMuscleGroup.png">
        </div>
        <div class="feature-info">
          <h2>Pin Muscle Group</h2>
          <p>Satisfied with a certain muscle group? Pin it! Let your other muscle groups catch up</p>
        </div>
      </div>
    </div>
  </a>
  <a href="pin-height.php">
    <div class="site-feature">
      <div class="pin-by-height">
        <div class="feature-info-img">
          <img src="img/pinHeight.png">
        </div>
        <div class="feature-info">
          <h2>Height</h2>
          <p>Choose your bodybuilder and see your ideal measurements by height</p>
        </div>
      </div>
    </div>
  </a>
  <a href="muscle-converter.php">
    <div class="site-feature">
      <div class="muscle-to-muscle">
        <div class="feature-info-img">
          <img src="img/muscleToMuscle.png">
        </div>
        <div class="feature-info">
          <h2>Muscle to Muscle</h2>
          <p>Compare two muscle groups using this conversion calculator with different bodybuilders</p>
        </div>
      </div>
    </div>
  </a>
  <a href="custom.php">
    <div class="site-feature">
      <div class="frankenstein">
        <div class="feature-info-img">
          <img src="img/customBody.png">
        </div>
        <div class="feature-info">
          <h2>Custom</h2>
          <p>Create your own ideal measurements and stay on track</p>
        </div>
      </div>
    </div>
  </a>
  <a href="golden-ratio.php">
    <div class="site-feature">
      <div class="golden-ratio">
        <div class="feature-info-img">
          <img src="img/goldenRatio.png">
        </div>
        <div class="feature-info">
          <h2>Golden Ratio</h2>
          <p>Do you have the golden ratio physique? Come and find out</p>
        </div>
      </div>
    </div>
  </a>
</div>


<?php require("includes/footer.php"); ?>
