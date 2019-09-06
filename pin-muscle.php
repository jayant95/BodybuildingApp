<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require("includes/form_template.php");
?>

<?php
  if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "<p>";
    unset($_SESSION['message']);
  }

  if (isset($_POST['submit'])) {
      $bodypart = !empty($_COOKIE["bodypart"]) ? $_COOKIE["bodypart"] : "";
      $bodybuilderName = $_POST['bodybuilder'];

    if (empty($bodypart) || empty($bodybuilderName)) {
      $_SESSION['message'] = "Please choose a bodypart and a bodybuilder!";
    } else {
      $_SESSION['bodybuilder'] = $bodybuilderName;
      $_SESSION['bodypart'] = $bodypart;
      $_SESSION['form-page'] = "bodypart";

      header('Location: pin-result.php');
    }

  }
  
?>



<div class="feature-info">
  <h2>Pin by Body Part</h2>
  <p>Selecting a body part will pin that body part for you and your bodybuilder of choice. 
    The results will show how your other muscle groups have to adapt in order to reach that physique.
    If desired, new measurements can be set as your current goal.
  </p>
</div>

<p id="hidden-part" hidden></p>


<form id='pinBodyPart' action='<?php echo($_SERVER['PHP_SELF']) ?>' method='post'>
  <div id="map" class="body-map bodybuilder-list">
  </div>

  <?php
    createBodybuilderForm($connection);
  ?>
</form>

<?php require("includes/footer.php");?>
<script src="script/map.js"></script>
<script>
  $('#map').imageMapResize();
</script>
