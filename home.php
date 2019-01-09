<?php
  require_once("includes/db_connection.php");
  
  $sql = "SELECT * FROM bodybuilders";
  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    // output data
    while($row = $result->fetch_assoc()) {
      echo "name: " . $row["name"];
      echo "<br />";
      echo "height: " . $row["height"] . " inch";
      echo "<br />";
      echo "<br />";
    }
  }

  $connection->close();
  
?>



  <?php require("includes/header.php"); ?>

  <div class="content-wrapper">
    <div class="main-features">
      <a href="#">
        <div class="site-feature">
          <div class="pin-muscle-group">
            <h2>Pin Muscle Group</h2>
            <p>Satisfied with a certain muscle group? Pin it! Let your other muscle groups catch up</p>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="site-feature">
          <div class="pin-by-height">
            <h2>Height</h2>
            <p>Choose your bodybuilder and see your ideal measurements by height</p>
          </div>
        </div>
      </a>
      <a href="#">
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
      <a href="#">
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