<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
?>

<div class="page-background">
  <div class="content-wrapper">
    <div class="main-features">
      <div class="first-row-features">
        <div class="site-feature">
          <a href="pin-height.php">
            <div class="feature-info-img by-height">
              <img src="img/pinHeight.png">
            </div>
            <div class="feature-info home">
              <h2>Height</h2>
              <p>Choose a bodybuilder and see your ideal measurements by height</p>
            </div>
          </a>
        </div>
        <div class="site-feature">
          <a href="muscle-converter.php">
            <div class="feature-info-img muscle-to-muscle">
              <img src="img/muscleToMuscle.png">
            </div>
            <div class="feature-info home">
              <h2>Muscle to Muscle</h2>
              <p>Conversion calculator to compare muscle groups</p>
            </div>
          </a>
        </div>
      </div>

      <div class="second-row-features">
        <div class="site-feature">
          <a href="pin-muscle.php">
            <div class="feature-info-img pin-muscle">
              <img src="img/pinMuscleGroup.png">
            </div>
            <div class="feature-info home">
              <h2>Pin Muscle Group</h2>
              <p>Choose a bodybuilder and see your ideal measurements by height</p>
            </div>
          </a>
        </div>
        <div class="site-feature">
          <a href="custom.php">
            <div class="feature-info-img custom-feature">
              <img src="img/customBody.png">
            </div>
            <div class="feature-info home">
              <h2>Custom</h2>
              <p>Create your own ideal measurements and stay on track</p>
            </div>
          </a>
        </div>
        <div class="site-feature">
          <a href="golden-ratio.php">
            <div class="feature-info-img golden-ratio">
              <img src="img/goldenRatio.png">
            </div>
            <div class="feature-info home">
              <h2>Golden Ratio</h2>
              <p>Do you have the golden ratio physique? Come and find out</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div> 
</div> 


<?php require("includes/footer.php"); ?>
