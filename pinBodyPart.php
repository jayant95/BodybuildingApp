<?php
  require_once("includes/db_connection.php");
  
  $sql = "SELECT * FROM bodybuilders";
  $result = $connection->query($sql);

?>

<?php require ("includes/header.php");?>

<h2>Pin Body Part</h2>

  <div class="content-wrapper">
    <div class="main-features">
      <a href="#">
        <div class="site-feature">
          <div class="pin-muscle-group">
            <h2>Arms</h2>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="site-feature">
          <div class="pin-by-height">
            <h2>Chest</h2>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="site-feature">
          <div class="pin-by-height">
            <h2>Waist</h2>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="site-feature">
          <div class="pin-by-height">
            <h2>Thighs</h2>
          </div>
        </div>
      </a>

      <a href="#">
        <div class="site-feature">
          <div class="pin-by-height">
            <h2>Calves</h2>
          </div>
        </div>
      </a>
    </div>
  </div>


<h2>Bodybuilders</h2>

  <div class="content-wrapper">
    <div class="main-features">
      <a href="#">

<?php 
  if ($result->num_rows > 0) {
    // output data
    while($row = $result->fetch_assoc()) {
      echo "        
      		<div class=\"site-feature\">
          	<div class=\"pin-muscle-group\">
          	";
      echo "name: " . $row["name"];
      echo "<br />";
      echo "height: " . $row["height"] . " inch";
      echo "</div>";
      echo "</div>";
      echo "<br />";
    }
  }

  $connection->close();
  
?>


          </div>
        </div>
      </a>
      <a href="#">
        <div class="site-feature">
          <div class="pin-by-height">
            <button type="submit" form="pinbodypart" value="Submit">Submit</button>
          </div>
        </div>
      </a>
    </div>
  </div>


<?php require ("includes/footer.php");?>