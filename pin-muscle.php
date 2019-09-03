<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require("includes/form_template.php");
?>

<div id="map" class="body-map">
</div>

<h3 id="muscleGroup"></h3>

<form id='pinBodyPart' action='pin-result.php' method='post'>
<?php
  createBodyPartForm();
  createBodybuilderForm($connection);
  $_SESSION['form-page'] = "bodypart";
?>
</form>


<?php require("includes/footer.php");?>
