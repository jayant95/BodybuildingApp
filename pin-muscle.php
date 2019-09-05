<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require("includes/form_template.php");
?>

<div class="feature-info">
  <h2>Pin by Body Part</h2>
  <p>Selecting a body part will pin that body part for you and your bodybuilder of choice. 
    The results will show how your other muscle groups have to adapt in order to reach that physique.
    If desired, new measurements can be set as your current goal.
  </p>
</div>


<form id='pinBodyPart' action='pin-result.php' method='post'>
  <div id="map" class="body-map bodybuilder-list">
  </div>

  <?php
    createBodybuilderForm($connection);
    $_SESSION['form-page'] = "bodypart";
  ?>
</form>


<?php require("includes/footer.php");?>
<script src="script/map.js"></script>
<script>
  $('#map').imageMapResize();
</script>
