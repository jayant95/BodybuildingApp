<!-- User settings include metric unit, change password, delete account, make account private/public (later on with addition of friends)
When user is registered these settings must be initially created in the settings table. Then from here we can update the values -->
<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  if (!empty($_SESSION['username'])) {
    $settings = getUserSettings($_SESSION['username'], $connection);
  }

  if (isset($_POST['save-settings'])) {
    $newSettings['unit'] = !empty($_POST['user-unit']) ? $_POST['user-unit'] : "";
    $newSettings['privacy'] = !empty($_POST['user-privacy']) ? $_POST['user-privacy'] : "";
    $settings['unit'] = $newSettings['unit'];
    $settings['privacy'] = $newSettings['privacy'];
    updateUserSettings($_SESSION['username'], $newSettings, $connection);
  }

?>

<div class="content-wrapper">
  <form action="" method="post">
    <div class="settings-form">
      <label>Unit:</label>
      <select name="user-unit">
        <?php
          if ($settings['unit'] === "Inches") {
            echo "<option value='Inches' selected>Inches</option>";
            echo "<option value='Centimeters'>Centimeters</option>";
          } else {
            echo "<option value='Centimeters' selected>Centimeters</option>";
            echo "<option value='Inches'>Inches</option>";
          }
        ?>
      </select>
      <label>Privacy:</label>
      <select name="user-privacy">
        <?php
        if ($settings['privacy'] === "Private") {
          echo "<option value='Private' selected>Private</option>";
          echo "<option value='Public'>Public</option>";
        } else {
          echo "<option value='Public' selected>Public</option>";
          echo "<option value='Private'>Private</option>";
        }
        ?>
      </select>
      <input class="login-button" type="submit" name="save-settings" value="Save"/>
    </div>
  </form>
</div>

<?php require("includes/footer.php"); ?>
