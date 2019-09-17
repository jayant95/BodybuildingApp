<?php
	session_start();
	require("includes/header.php");
	require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

	$editActive = false;

	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
		$_SESSION['redirect'] = "custom.php";
	}

	if (isset($_POST['edit'])) {
		$editActive = true;
	}

	if (isset($_POST['update'])) {
		$editActive = false;
		$userNewGoal['chest'] = !empty($_POST['chest']) ? $_POST['chest'] : "";
		$userNewGoal['shoulders'] = !empty($_POST['shoulders']) ? $_POST['shoulders'] : "";
		$userNewGoal['neck'] = !empty($_POST['neck']) ? $_POST['neck'] : "";
		$userNewGoal['arms'] = !empty($_POST['arms']) ? $_POST['arms'] : "";
		$userNewGoal['waist'] = !empty($_POST['waist']) ? $_POST['waist'] : "";
		$userNewGoal['thighs'] = !empty($_POST['thighs']) ? $_POST['thighs'] : "";
		$userNewGoal['calves'] = !empty($_POST['calves']) ? $_POST['calves'] : "";
		$userNewGoal['weight'] = !empty($_POST['weight']) ? $_POST['weight'] : "";
		$userNewGoal['bodyfat'] = !empty($_POST['bodyfat']) ? $_POST['bodyfat'] : "";
		$userNewGoal['featureName'] = "custom";
		$userNewGoal['memberID'] = $_SESSION['memberID'];
		$userNewGoal['bodybuilder'] = "";
		$userNewGoal['bodybuilderID'] = -1;
		$userNewGoal['currentGoal'] = 1;
		$userNewGoal['date'] = time();

		updateCustomUserGoal($userNewGoal, $connection);
	}

  $userStats = getProfileInformation($_SESSION['username'], $connection);
  $userGoal = getCurrentUserGoal($_SESSION['memberID'], $connection);

	if (!$userGoal) {
		$editActive = true;
	}
?>

<div class="page-background">
	<div class="content-wrapper">
		<div class="user-stats current">
			<h2>Current Stats</h2>
			<div class="stats-group left">
				<p>Chest: <?php echo $userStats['chest']  ?></p>
				<p>Shoulders: <?php echo $userStats['shoulders']  ?></p>
				<p>Neck: <?php echo $userStats['neck']  ?></p>
				<p>Left Arm: <?php echo $userStats['leftArm']  ?></p>
				<p>Right Arm: <?php echo $userStats['rightArm']  ?></p>
			</div>
			<div class="stats-group right">
				<p>Waist: <?php echo $userStats['waist']  ?></p>
				<p>Left Thigh: <?php echo $userStats['leftThigh']  ?></p>
				<p>Right Thigh: <?php echo $userStats['rightThigh']  ?></p>
				<p>Left Calf: <?php echo $userStats['leftCalf']  ?></p>
				<p>Right Calf: <?php echo $userStats['rightCalf']  ?></p>
			</div>
		</div>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div class="user-stats">
				<h2>Current Goal</h2>
				<div class="custom-stats">
					<div class="stats-group left">
						<div class="custom-stat-group">
							<label>Type:</label>
							<?php echo $userGoal ? "<p>" . $userGoal['featureName'] . "</p>" : "<p>N/A</p>"; ?>
						</div>
							<?php
								if ($userGoal) {
									if ($userGoal['bodybuilder'] != NULL) {
										echo "<div class='custom-stat-group'>";
										echo 		"<label>Bodybuilder:</label>";
										echo 		"<p>" . $userGoal['bodybuilder'] . "</p>";
										echo "</div>";
									}
								}
							?>
						<div class="custom-stat-group">
							<?php echo $editActive ? "<label class='input-label'>Chest:</label>" : "<label>Chest:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='chest' value=". $userGoal['chest'] .">" : "<p>" . $userGoal['chest'] . "</p>"; ?>
						</div>
						<div class="custom-stat-group">
							<?php echo $editActive ? "<label class='input-label'>Shoulders:</label>" : "<label>Shoulders:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='shoulders' value=". $userGoal['shoulders'] .">" : "<p>" . $userGoal['shoulders'] . "</p>"; ?>
						</div>
						<div class="custom-stat-group">
						<?php echo $editActive ? "<label class='input-label'>Neck:</label>" : "<label>Neck:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='neck' value=". $userGoal['neck'] .">" : "<p>" . $userGoal['neck'] . "</p>"; ?>
						</div>
						<div class="custom-stat-group">
							<?php echo $editActive ? "<label class='input-label'>Arms:</label>" : "<label>Arms:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='arms' value=". $userGoal['arms'] .">" : "<p>" . $userGoal['arms'] . "</p>"; ?>
						</div>
					</div>
					<div class="stats-group right">
						<div class="custom-stat-group">
							<?php echo $editActive ? "<label class='input-label'>Waist:</label>" : "<label>Waist:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='waist' value=". $userGoal['waist'] .">" : "<p>" . $userGoal['waist'] . "</p>"; ?>
						</div>
						<div class="custom-stat-group">
							<?php echo $editActive ? "<label class='input-label'>Thighs:</label>" : "<label>Thighs:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='thighs' value=". $userGoal['thighs'] .">" : "<p>" . $userGoal['thighs'] . "</p>"; ?>
						</div>
						<div class="custom-stat-group">
							<?php echo $editActive ? "<label class='input-label'>Calves:</label>" : "<label>Calves:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='calves' value=". $userGoal['calves'] .">" : "<p>" . $userGoal['calves'] . "</p>"; ?>
						</div>
						<div class="custom-stat-group">
						<?php echo $editActive ? "<label class='input-label'>Weight:</label>" : "<label>Weight:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='weight' value=". $userGoal['weight'] .">" : "<p>" . $userGoal['weight'] . "</p>"; ?>
						</div>
						<div class="custom-stat-group">
						<?php echo $editActive ? "<label class='input-label'>Body Fat:</label>" : "<label>Body Fat:</label>"?>
							<?php echo $editActive ? "<input class='form-input' type='number' step='any' name='bodyfat' value=". $userGoal['bodyFat'] .">" : "<p>" . $userGoal['bodyFat'] . "</p>"; ?>
						</div>
					</div>
					<div class="custom-stat-group custom-btn">
						<?php echo $editActive ? "<input class='login-button' type='submit' name='update' value='Update Goal'>" : "<input class='login-button' type='submit' name='edit' value='Edit Goal'>"; ?>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php require("includes/navigation_bottom.php"); ?>
</div>



<?php require("includes/footer.php");?>


<!-- Should include a settings page for user settings. Ex. Inches or CM. etc. -->
