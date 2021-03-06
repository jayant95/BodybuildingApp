<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require("includes/form_template.php");

  if (isset($_POST['submit'])) {
    $bodybuilderName = $_POST['bodybuilder'];

    if (!empty($bodybuilderName)) {
      $_SESSION['bodybuilder'] = $bodybuilderName;
      $_SESSION['form-page'] = "height";

      header('Location: pin-result.php');
    } else {
      $_SESSION['message'] = "Please choose a bodybuilder!";
    }
  }

  if (isset($_SESSION['message'])) {
    echo "<div class='site-message'>";
    echo "<p>" . $_SESSION['message'] . "</p>";
    echo "</div>";
    unset($_SESSION['message']);
  }
?>
<div class="page-background">
  <div class="content-wrapper">
    <div class="feature-info">
      <h2>Pin by Height</h2>
      <p>Selecting a bodybuilder will give you the proportional measurements based on your individual heights.
      If desired, new measurements can be set as your current goal.
      </p>
    </div>

    <form id='pinBodyPart' action='<?php echo($_SERVER['PHP_SELF']) ?>' method='post'>
    <?php
      createBodybuilderForm($connection);
      $_SESSION['form-page'] = "height";
    ?>
    </form>

  </div>
  <?php require("includes/navigation_bottom.php"); ?>
</div>
<?php require("includes/footer.php");?>
