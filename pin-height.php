<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require("includes/form_template.php");
?>

<form id='pinBodyPart' action='pin-result.php' method='post'>
<?php
  createBodybuilderForm($connection);
  $_SESSION['form-page'] = "height";
?>
</form>

<?php require("includes/footer.php");?>
