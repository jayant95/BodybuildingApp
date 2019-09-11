<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  $user_profile = [];
  $editActive = false;

  if (!empty($_SESSION['username'])) {
    $user_profile = getProfileInformation($_SESSION['username'], $connection);
    $userGoal = getCurrentUserGoal($_SESSION['memberID'], $connection);
  } else {
    header("Location: login.php");
  }

  if (isset($_POST['edit'])) {
    $editActive = true;
  }

  if (isset($_POST['update'])) {
    $editActive = false;
    $user_profile['leftArm'] = !empty($_POST['leftArm']) ? $_POST['leftArm'] : "";
    $user_profile['rightArm'] = !empty($_POST['rightArm']) ? $_POST['rightArm'] : "";
    $user_profile['chest'] = !empty($_POST['chest']) ? $_POST['chest'] : "";
    $user_profile['waist'] = !empty($_POST['waist']) ? $_POST['waist'] : "";
    $user_profile['leftThigh'] = !empty($_POST['leftThigh']) ? $_POST['leftThigh'] : "";
    $user_profile['rightThigh'] = !empty($_POST['rightThigh']) ? $_POST['rightThigh'] : "";
    $user_profile['leftCalf'] = !empty($_POST['leftCalf']) ? $_POST['leftCalf'] : "";
    $user_profile['rightCalf'] = !empty($_POST['rightCalf']) ? $_POST['rightCalf'] : "";
    $user_profile['shoulders'] = !empty($_POST['shoulders']) ? $_POST['shoulders'] : "";
    $user_profile['neck'] = !empty($_POST['neck']) ? $_POST['neck'] : "";
    $user_profile['wrists'] = !empty($_POST['wrists']) ? $_POST['wrists'] : "";
    $user_profile['ankles'] = !empty($_POST['ankles']) ? $_POST['ankles'] : "";
    $user_profile['knee'] = !empty($_POST['knee']) ? $_POST['knee'] : "";
    $user_profile['bodyFat'] = !empty($_POST['bodyFat']) ? $_POST['bodyFat'] : "";
    $user_profile['weight'] = !empty($_POST['weight']) ? $_POST['weight'] : "";
    $user_profile['height'] = !empty($_POST['height']) ? $_POST['height'] : "";
    $user_profile['memberID'] = !empty($_SESSION['memberID']) ? $_SESSION['memberID'] : "";

    updateUserProfile($user_profile, $connection);

  }

  if (isset($_POST['save-log'])) {
    $user_profile = getProfileInformation($_SESSION['username'], $connection);
    saveUserProfileLog($user_profile, $connection);
  }

  if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "<p>";
    unset($_SESSION['message']);
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
      <div class="profile-flexbox">
        <div class="flexbox-panel">
          <div class="profile-info-group">
            <label>Left Arm:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='leftArm' value=".$user_profile['leftArm'].">" : "<p>".$user_profile['leftArm']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Right Arm:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='rightArm' value=".$user_profile['rightArm'].">" : "<p>".$user_profile['rightArm']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Chest:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='chest' value=".$user_profile['chest'].">" : "<p>".$user_profile['chest']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Waist:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='waist' value=".$user_profile['waist'].">" : "<p>".$user_profile['waist']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Left Thigh:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='leftThigh' value=".$user_profile['leftThigh'].">" : "<p>".$user_profile['leftThigh']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Right Thigh:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='rightThigh' value=".$user_profile['rightThigh'].">" : "<p>".$user_profile['rightThigh']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Left Calf:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='leftCalf' value=".$user_profile['leftCalf'].">" : "<p>".$user_profile['leftCalf']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Right Calf:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='rightCalf' value=".$user_profile['rightCalf'].">" : "<p>".$user_profile['rightCalf']."</p>"; ?>
          </div>
        </div>
        <div class="flexbox-panel">
          <div class="profile-info-group">
            <label>Shoulders:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='shoulders' value=".$user_profile['shoulders'].">" : "<p>".$user_profile['shoulders']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Neck:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='neck' value=".$user_profile['neck'].">" : "<p>".$user_profile['neck']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Wrists:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='wrists' value=".$user_profile['wrists'].">" : "<p>".$user_profile['wrists']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Knee:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='knee' value=".$user_profile['knee'].">" : "<p>".$user_profile['knee']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Ankles:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='ankles' value=".$user_profile['ankles'].">" : "<p>".$user_profile['ankles']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Body Fat:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='bodyFat' value=".$user_profile['bodyFat'].">" : "<p>".$user_profile['bodyFat']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Weight:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='weight' value=".$user_profile['weight'].">" : "<p>".$user_profile['weight']."</p>"; ?>
          </div>
          <div class="profile-info-group">
            <label>Height:</label>
            <?php echo $editActive ? "<input class='profile-input' type='number' step='0.01' name='height' value=".$user_profile['height'].">" : "<p>".$user_profile['height']."</p>"; ?>
          </div>
        </div>
      </div>

      <?php echo $editActive ? "<input class='profile-button' type='submit' name='update' value='Update'/>" : "<input class='profile-button' type='submit' name='edit' value='Edit'/>" ;?>
      <input class="profile-button" type="submit" name="save-log" value="Save to History">
    </div>
  </form>

  <h2>Current Goal</h2>
  <div class="custom-stats">
    <div class="profile-flexbox">
      <div class="flexbox-panel">
        <div class="custom-stat-group">
          <label>Type:</label>
          <?php echo $userGoal ? "<p>" . $userGoal['featureName'] . "</p>" : "<p>N/A</p>"; ?>
        </div>
          <?php
            if ($userGoal) {
              if ($userGoal['bodybuilder'] != NULL) {
                echo "<div class='custom-stat-group'>";
                echo 		"<label>Bodybuilder: </label>";
                echo 		"<p>" . $userGoal['bodybuilder'] . "</p>";
                echo "</div>";
              }
            }
          ?>
        <div class="custom-stat-group">
          <label>Chest:</label>
          <?php echo "<p>" . round($userGoal['chest'], 2) . "</p>"; ?>
        </div>
        <div class="custom-stat-group">
          <label>Shoulders:</label>
          <?php echo "<p>" . round($userGoal['shoulders'], 2) . "</p>"; ?>
        </div>
        <div class="custom-stat-group">
          <label>Neck:</label>
          <?php echo "<p>" . round($userGoal['neck'], 2) . "</p>"; ?>
        </div>
        <div class="custom-stat-group">
          <label>Arms:</label>
          <?php echo "<p>" . round($userGoal['arms'], 2) . "</p>"; ?>
        </div>
      </div>
      <div class="flexbox-panel">
        <div class="custom-stat-group">
          <label>Waist:</label>
          <?php echo "<p>" . round($userGoal['waist'], 2) . "</p>"; ?>
        </div>
        <div class="custom-stat-group">
          <label>Thighs:</label>
          <?php echo "<p>" . round($userGoal['thighs'], 2) . "</p>"; ?>
        </div>
        <div class="custom-stat-group">
          <label>Calves:</label>
          <?php echo "<p>" . round($userGoal['calves'], 2) . "</p>"; ?>
        </div>
        <div class="custom-stat-group">
          <label>Weight:</label>
          <?php echo "<p>" . round($userGoal['weight'], 2) . "</p>"; ?>
        </div>
        <div class="custom-stat-group">
          <label>Body Fat:</label>
          <?php echo "<p>" . round($userGoal['bodyFat'], 2) . "</p>"; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="measurement-history">
    <h3>Measurement History</h3>
    <table class="log-history-table">
      <tr>
        <th>Date</th>
        <th>Left Arm</th>
        <th>Right Arm</th>
        <th>Chest</th>
        <th>Shoulders</th>
        <th>Neck</th>
        <th>Waist</th>
        <th>Left Thigh</th>
        <th>Right Thigh</th>
        <th>Left Calf</th>
        <th>Right Calf</th>
        <th>Weight</th>
        <th>Body Fat</th>
      </tr>
      <?php
        $log = getUserMeasurementLog($_SESSION['memberID'], $connection);
        foreach($log as $row_array) {
          $date = date('m/d/Y', $row_array['timestamp']);
          echo "<tr>";
          echo "<td>" . $date . "</td>";
          echo "<td>" . $row_array['leftArm'] . "</td>";
          echo "<td>" . $row_array['rightArm'] . "</td>";
          echo "<td>" . $row_array['chest'] . "</td>";
          echo "<td>" . $row_array['shoulders'] . "</td>";
          echo "<td>" . $row_array['neck'] . "</td>";
          echo "<td>" . $row_array['waist'] . "</td>";
          echo "<td>" . $row_array['leftThigh'] . "</td>";
          echo "<td>" . $row_array['rightThigh'] . "</td>";
          echo "<td>" . $row_array['leftCalf'] . "</td>";
          echo "<td>" . $row_array['rightCalf'] . "</td>";
          echo "<td>" . $row_array['weight'] . "</td>";
          echo "<td>" . $row_array['bodyFat'] . "</td>";
          echo "</tr>";
        }
      ?>
    </table>
  </div>
  <div class="upload-history">
    <a href="profile-history.php">Progress Pictures</a>
  </div>
</div>

<?php require("includes/footer.php"); ?>
