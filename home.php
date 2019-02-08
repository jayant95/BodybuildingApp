<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
?>

<div class="content-wrapper">
  <div class="main-features">
    <a href="pin-muscle.php">
      <div class="site-feature">
        <div class="pin-muscle-tab">
          <h2>Pin Muscle Group</h2>
          <p>Satisfied with a certain muscle group? Pin it! Let your other muscle groups catch up</p>
        </div>
      </div>
    </a>
    <a href="pin-height.php">
      <div class="site-feature">
        <div class="pin-by-height">
          <h2>Height</h2>
          <p>Choose your bodybuilder and see your ideal measurements by height</p>
        </div>
      </div>
    </a>
    <a href="muscle-converter.php">
      <div class="site-feature">
        <div class="muscle-to-muscle">
          <h2>Muscle to Muscle</h2>
          <p>Compare two muscle groups using this conversion calculator with different bodybuilders</p>
        </div>
      </div>
    </a>
    <a href="#">
      <div class="site-feature">
        <div class="frankenstein">
          <h2>Frankenstein</h2>
          <p>Create your own ideal measurements and stay on track</p>
        </div>
      </div>
    </a>
    <a href="golden-ratio.php">
      <div class="site-feature">
        <div class="golden-ratio">
          <h2>Golden Ratio</h2>
          <p>Do you have the golden ratio physique? Come and find out</p>
        </div>
      </div>
    </a>
  </div>
</div>

<?php require("includes/footer.php"); ?>
