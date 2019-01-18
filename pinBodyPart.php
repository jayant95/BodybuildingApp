<?php
  require_once("includes/db_connection.php");
  
  $sql = "SELECT * FROM bodybuilders";
  $result = $connection->query($sql);

?>

<?php require ("includes/header.php");?>
          <form id="pinBodyPart" action="pinBodyPartForm.php" method="post">




    <div class="main-features">
      <h2>Pin Body Part</h2>
        <a href="#">
          <div class="site-feature">
            <div class="pin-muscle-group" id="arms">
              <h2>Arms</h2>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="site-feature">
            <div class="pin-muscle-group" id="chest">
              <h2>Chest</h2>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="site-feature">
            <div class="pin-muscle-group" id="waist">
              <h2>Waist</h2>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="site-feature">
            <div class="pin-muscle-group" id="thighs">
              <h2>Thighs</h2>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="site-feature">
            <div class="pin-muscle-group" id="calves">
              <h2>Calves</h2>
            </div>
          </div>
        </a>
      </div>




<div class="main-features">

  <h2>Bodybuilders</h2>

    <?php 
      if ($result->num_rows > 0) {
        // output data
        while($row = $result->fetch_assoc()) {
          echo "<a href=\"#\">";
          echo "
          		<div class=\"site-feature\">
              	<div class=\"bodybuilder\" id=\"". $row["name"] . "\">
              	";
          echo "name: " . $row["name"];
          echo "<br />";
          echo "height: " . $row["height"] . " inch";
          echo "</a>";
          echo "</div>";
          echo "</div>";
          echo "<br />";
        }
      }

      $connection->close();
      
    ?>
</div>
      <a href="#">
        <div class="site-feature">
            <input type="submit" id="submit" name="submit" value="Submit">
            
        </div>
         </form>
      </a>
    </div>


<?php require ("includes/footer.php");?>