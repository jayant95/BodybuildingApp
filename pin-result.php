<?php
	session_start();
	require("includes/header.php");
	require_once("includes/db_connection.php");
	require("includes/helper_functions.php");

	echo "<div class='page-background short-page'>";
	echo "<div class='content-wrapper'>";
	echo "<div class='user-stats table'>";
	// if (isset($_POST['submit'])) {
		if (!isset($_SESSION['username'])) {
			header("Location: login.php");
			$_SESSION['message'] = "Please sign in to view your results!";
		}
	
		$formPage = !empty($_SESSION['form-page']) ? $_SESSION['form-page'] : "";
		$memberID = $_SESSION['memberID'];

		$bp = !empty($_SESSION["bodypart"]) ? $_SESSION["bodypart"] : "";

		if ($formPage == "bodypart") {
			$pinnedAttribute = $bp;
		} else if ($formPage == "height") {
			$pinnedAttribute = "height";
		}

		$bodybuilderName = $_SESSION['bodybuilder'];
		$bodybuilderStats = getBodybuilderStats($bodybuilderName, $connection);
		$userStats = getProfileInformation($_SESSION['username'], $connection);

		$chestRatio = $bodybuilderStats['chest'] / $bodybuilderStats[$pinnedAttribute];
		$armRatio = $bodybuilderStats['arms'] / $bodybuilderStats[$pinnedAttribute];
		$waistRatio = $bodybuilderStats['waist'] / $bodybuilderStats[$pinnedAttribute];
		$thighRatio = $bodybuilderStats['thighs'] / $bodybuilderStats[$pinnedAttribute];
		$calfRatio = $bodybuilderStats['calves'] / $bodybuilderStats[$pinnedAttribute];

		echo "<h2>Results: Pin by " . $pinnedAttribute . " using " . $bodybuilderName . "</h2>";

		if ($pinnedAttribute == "calves") {
			$pinnedAttribute = "leftCalf";
		} else if ($pinnedAttribute == "thighs") {
			$pinnedAttribute = "leftThigh";
		} else if ($pinnedAttribute == "arms") {
			$pinnedAttribute = "leftArm";
		}
		
		if (isset($userStats[$pinnedAttribute])) {
			$resultChest = $userStats[$pinnedAttribute] * $chestRatio;
			$resultArms = $userStats[$pinnedAttribute] * $armRatio;
			$resultWaist = $userStats[$pinnedAttribute] * $waistRatio;
			$resultThighs = $userStats[$pinnedAttribute] * $thighRatio;
			$resultCalves = $userStats[$pinnedAttribute] * $calfRatio;
		} else {
			$resultChest = 0;
			$resultArms = 0;
			$resultWaist = 0;
			$resultThighs = 0;
			$resultCalves = 0;
		}

		$userGoal['chest'] = $resultChest;
		$userGoal['arms'] = $resultArms;
		$userGoal['waist'] = $resultWaist;
		$userGoal['thighs'] = $resultThighs;
		$userGoal['calves'] = $resultCalves;
		$userGoal['featureName'] = "Pin by " . $pinnedAttribute;
		$userGoal['bodybuilder'] = $bodybuilderName;
		$_SESSION['goal'] = $userGoal;
	// }

	if (isset($_POST['update'])) {
		$userGoal['chest'] = $_SESSION['goal']['chest'];
		$userGoal['arms'] = $_SESSION['goal']['arms'];;
		$userGoal['waist'] = $_SESSION['goal']['waist'];;
		$userGoal['thighs'] = $_SESSION['goal']['thighs'];;
		$userGoal['calves'] = $_SESSION['goal']['calves'];;
		$userGoal['featureName'] = $_SESSION['goal']['featureName'];
		$userGoal['bodybuilder'] = $_SESSION['goal']['bodybuilder'];
		$userGoal['memberID'] = $_SESSION['memberID'];
		$userGoal['currentGoal'] = 1;
		$userGoal['date'] = time();
		updateUserGoal($userGoal, $connection);

		unset($_SESSION['goal']);
		header("Location: profile.php");
	}
?>
	<table class="ratio-table">
		<tr>
			<th>Name</th>
			<th>Chest</th>
			<th>Arms</th>
			<th>Waist</th>
			<th>Thighs</th>
			<th>Calves</th>
		</tr>
		<tr>
			<?php
				echo "<td>" . $bodybuilderStats['name'] . "</td>";
				echo "<td>" . $bodybuilderStats['chest'] . "</td>";
				echo "<td>" . $bodybuilderStats['arms'] . "</td>";
				echo "<td>" . $bodybuilderStats['waist'] . "</td>";
				echo "<td>" . $bodybuilderStats['thighs'] . "</td>";
				echo "<td>" . $bodybuilderStats['calves'] . "</td>";
			?>
		</tr>
		<tr>
			<?php
				echo "<td>" . $userStats['first-name'] . " " . $userStats['last-name'] . "</td>"; 
				echo isset($userStats['chest']) ?  "<td>" . $userStats['chest'] . "</td>" : "<td>N/A</td>"; 
				echo isset($userStats['leftArm']) ?  "<td>" . $userStats['leftArm'] . "</td>" : "<td>N/A</td>";
				echo isset($userStats['waist']) ?  "<td>" . $userStats['waist'] . "</td>" : "<td>N/A</td>"; 
				echo isset($userStats['leftThigh']) ?  "<td>" . $userStats['leftThigh'] . "</td>" : "<td>N/A</td>"; 
				echo isset($userStats['leftCalf']) ?  "<td>" . $userStats['leftCalf'] . "</td>" : "<td>N/A</td>"; 
			?>
		</tr>
		<tr>
			<?php
				echo "<th>Result</th>";
				echo "<td>" . round($resultChest, 2) . "</td>";
				echo "<td>" . round($resultArms, 2) . "</td>";
				echo "<td>" . round($resultWaist, 2) . "</td>";
				echo "<td>" . round($resultThighs, 2) . "</td>";
				echo "<td>" . round($resultCalves, 2) . "</td>";
			?>
		</tr>
		<tr>
		<?php
				echo "<th>+/-</th>";
				echo isset($userStats['chest']) ?  "<td>" . round($resultChest - $userStats['chest'], 2) . "</td>" : "<td>N/A</td>";
				echo isset($userStats['leftArm']) ?  "<td>" . round($resultArms - $userStats['leftArm'], 2) . "</td>" : "<td>N/A</td>";
				echo isset($userStats['waist']) ?  "<td>" . round($resultWaist- $userStats['waist'], 2) . "</td>" : "<td>N/A</td>";
				echo isset($userStats['leftThigh']) ?  "<td>" . round($resultThighs - $userStats['leftThigh'], 2) . "</td>" : "<td>N/A</td>";
				echo isset($userStats['leftCalf']) ?  "<td>" . round($resultCalves - $userStats['leftCalf'], 2) . "</td>" : "<td>N/A</td>";
			?>
		</tr>
	</table>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<input class='login-button' type='submit' name='update' value='Update Goal'>
	</form>
	</div>
	<div class="feature-info details">
		<p>*All measurements are in inches</p>
		<h3>Walkthrough Example</h3>
		<p>Pinned attribute: Calves | Bodybuilder: Arnold Schwarzenegger: 20in | User: 15in</p>
		<p>Arnold's Ratios:</p>
		<p>Arms: 22 / 20 = 1.1 | Chest: 57 / 20 = 2.85 | Waist: 34 / 20 = 1.7 | Thighs: 28.5 / 20 = 1.425</p>
		<p>Users ideal size:</p>
		<p>Arms: 15 * 1.1 = 16.5in | Chest: 15 * 2.85 = 42.75in | Waist: 15 * 1.7 = 25.5in | Thighs: 15 * 1.425 = 21.38in</p>
		<p>-------------------------------------------------------------------------------------------------------------------</p>
		<p>Results show which areas need improvement in order to hold the same proportions as chosen bodybuilder</p>
		<p>Click 'Update Goal' in order to set these current proportions and measurements as your current goal<p>
	</div>
</div>
<?php require("includes/navigation_bottom.php"); ?>
</div>

<?php require("includes/footer.php"); ?>
