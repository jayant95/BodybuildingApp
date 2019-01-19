<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  $user_profile = [];
  $editActive = false;
  if (!empty($_SESSION['username'])) {
    $user_profile = getProfileInformation($_SESSION['username'], $connection);
  } else {
    header("Location: login.php");
  }

  if (isset($_POST['edit'])) {
    $editActive = true;
  }

  if (isset($_POST['save'])) {
    $user_profile['leftArm'] = !empty($_POST['leftArm']) ? $_POST['leftArm'] : "";
    $user_profile['rightArm'] = !empty($_POST['rightArm']) ? $_POST['rightArm'] : "";
    $user_profile['chest'] = !empty($_POST['chest']) ? $_POST['chest'] : "";
    $user_profile['waist'] = !empty($_POST['waist']) ? $_POST['waist'] : "";
    $user_profile['leftThigh'] = !empty($_POST['leftThigh']) ? $_POST['leftThigh'] : "";
    $user_profile['rightThigh'] = !empty($_POST['rightThigh']) ? $_POST['rightThigh'] : "";
    $user_profile['leftCalf'] = !empty($_POST['leftCalf']) ? $_POST['leftCalf'] : "";
    $user_profile['rightCalf'] = !empty($_POST['rightCalf']) ? $_POST['rightCalf'] : "";
    $user_profile['shoulders'] = !empty($_POST['shoulders']) ? $_POST['shoulders'] : "";
    $user_profile['wrists'] = !empty($_POST['wrists']) ? $_POST['wrists'] : "";
    $user_profile['ankles'] = !empty($_POST['ankles']) ? $_POST['ankles'] : "";
    $user_profile['bodyFat'] = !empty($_POST['bodyFat']) ? $_POST['bodyFat'] : "";



  }



?>

<div class="content-wrapper">
  <h2>Account Details</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="profile-form">
      <div class="profile-info-group">
        <label>First Name:</label>
        <p><?php echo $user_profile['first-name'] ?></p>
      </div>
      <div class="profile-info-group">
        <label>Last Name:</label>
        <p><?php echo $user_profile['last-name'] ?></p>
      </div>
      <div class="profile-info-group">
        <label>Email:</label>
        <p><?php echo $user_profile['email'] ?></p>
      </div>
      <div class="profile-info-group">
        <label>Username:</label>
        <p><?php echo $user_profile['username'] ?></p>
      </div>
      <h3>Measurements</h3>
      <div class="profile-info-group">
        <label>Left Arm:</label>
        <?php echo $editActive ? "<input class='profile-input' type='number' name='leftArm' value=".$user_profile['leftArm']."" : "<p>".$user_profile['leftArm']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Right Arm:</label>
        <?php echo $editActive ? "<input class='profile-input' type='number' name='rightArm' value=".$user_profile['rightArm']."" : "<p>".$user_profile['rightArm']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Chest:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='chest' value=".$user_profile['chest']."" : "<p>".$user_profile['chest']."</p>"; ?>
      <div class="profile-info-group">
        <label>Waist:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='waist' value=".$user_profile['waist']."" : "<p>".$user_profile['waist']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Left Thigh:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='leftThigh' value=".$user_profile['leftThigh']."" : "<p>".$user_profile['leftThigh']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Right Thigh:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='rightThigh' value=".$user_profile['rightThigh']."" : "<p>".$user_profile['rightThigh']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Left Calf:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='leftCalf' value=".$user_profile['leftCalf']."" : "<p>".$user_profile['leftCalf']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Right Calf:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='rightCalf' value=".$user_profile['rightCalf']."" : "<p>".$user_profile['rightCalf']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Shoulders:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='shoulders' value=".$user_profile['shoulders']."" : "<p>".$user_profile['shoulders']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Wrists:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='wrists' value=".$user_profile['wrists']."" : "<p>".$user_profile['wrists']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Ankles:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='ankles' value=".$user_profile['ankles']."" : "<p>".$user_profile['ankles']."</p>"; ?>
      </div>
      <div class="profile-info-group">
        <label>Body Fat:</label>
        <?php echo $editActive ? "<input class='profile-input' type='text' name='bodyFat' value=".$user_profile['bodyFat']."" : "<p>".$user_profile['bodyFat']."</p>"; ?>
      </div>
      <?php echo $editActive ? "<input class='profile-button' type='submit' name='save' value='Save'/>" : "<input class='profile-button' type='submit' name='edit' value='Edit'/>" ;?>
    </div>
  </form>
</div>
