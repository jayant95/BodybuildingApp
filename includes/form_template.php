<?php

  function createBodyPartForm() {
    $bodyparts = array(
      "Arms" => "arms",
      "Chest" => "chest",
      "Waist" => "waist",
      "Thighs" => "thighs",
      "Calves" => "calves"
    );

    echo  "<div class='bodypart-options'>";
    echo    "<h2>Pin Body Part</h2>";

    foreach ($bodyparts as $key => $value) {
      echo    "<a href='#'>";
      echo      "<div class='site-feature'>";
      echo        "<div class='pin-muscle-group' id='" . $value . "'>";
      echo          "<h2>" . $key . "</h2>";
      echo        "</div>";
      echo      "</div>";
      echo    "</a>";
    }
    echo    "<input class='bodypart-hidden-input' name='bodypart' value='' type='hidden'>";
    echo  "</div>";
  }

  function createBodybuilderForm($connection) {
    echo  "<div class='bodybuilder-list'>";
    // echo    "<h2>Bodybuilders</h2>";

    $sql = "SELECT * FROM bodybuilders";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
      // output data
      while($row = $result->fetch_assoc()) {
        echo "<a href='#'>";
        echo    "<div class='bodybuilder-name-list'>";
        echo      "<div class='bodybuilder' id='". $row["name"] . "'>";
        echo        "<p>" . $row["name"] . "</p>";
        echo        "<p>Height: " . $row["height"] . " inches</p>";
        echo      "</div>";
        echo    "</div>";
        echo "</a>";
      }
    }
    $connection->close();

    echo    "<input class='bodybuilder-hidden-input' name='bodybuilder' value='' type='hidden'>";
    echo  "<a href='#'>";
    echo    "<div class='bodybuilder-name-list form-submit'>"; 
    echo      "<input type='submit' id='submit' name='submit' value='Submit'>";
    echo    "</div>";
    echo  "</a>";
    echo  "</div>";

 
  }
 ?>
