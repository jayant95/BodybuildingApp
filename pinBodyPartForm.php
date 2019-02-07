<?php
	session_start();
	require("includes/header.php");
	require("includes/db_connection.php");
	require("includes/helper_functions.php");

	// if (isset($_SESSION['username'])) {
	// 	echo $_SESSION['memberID'];
	// }

	// $sql = "SELECT
	// 			memberID AS id
	// 		FROM members";
	// $members = $connection->query($sql);
	// echo $members->id;


	// $memberID = "11";

	// $bodybuilderName = $_POST['bodybuilder'];





//	 echo $bodybuilderName;
	// $featureName = $_POST['pin'];
	// $currentGoal = $_POST['true']; // not sure how to update this once the next goal comes in
	// $date = $_POST['0000'];

/*
	$sql = "SELECT
				bodybuilders.bodybuilderID AS bb_id,
				bodybuilders.name AS bb_name,
				bodybuilders.height AS bb_height,
				bodybuilders.contestWeight AS bb_contestWeight,
				bodybuilders.offseasonWeight AS bb_offseasonWeight,
				bodybuilders.arms AS bb_arms,
				bodybuilders.chest AS bb_chest,
				bodybuilders.waist AS bb_waist,
				bodybuilders.thighs AS bb_thighs,
				bodybuilders.calves AS bb_calves,

				members.memberID AS member_id,
				members.leftArm AS member_arm,
				members.chest AS member_chest,
				members.waist AS member_waist,
				members.leftThigh AS member_thigh,
				members.leftCalf AS member_calf,
				members.shoulders AS member_shoulders,
				members.ankles AS member_ankles
			FROM bodybuilders
			FULL OUTER JOIN members
			ON members.$memberID = bodybuilders.$bodybuilderID
			WHERE bodybuilders.name = $bodybuilderName
		";
	$result = $connection->query($sql);

	// Figure out calculations for body parts
	// Pinned body part: pinnedNumber / pinnedPart
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

			$pinnedPart = $_POST['muscleGroup'];
			$pinnedMeasurement = $row[$pinnedPart];

			if ($pinnedPart == 'calves') {
				$ratioArms = bb_arms/$pinnedMeasurement;
				$ratioChest = bb_chest/$pinnedMeasurement;
				$ratioWaist = bb_waist/$pinnedMeasurement;
				$ratioThighs = bb_thighs/$pinnedMeasurement;
			}

			// Find member's ideal measurements - go into member table for their data

			}



	}

	*/

	// check if form is submitted
	if (isset($_POST['submit'])) {
		$memberID = $_SESSION['memberID'];

		// chosen bodybuilder has the 'name' attribute associated w hidden input
		$bodybuilderName = $_POST['bodybuilder'];
		$pinnedMuscle = $_POST['bodypart'];
		$bodybuilderStats = getBodybuilderStats($bodybuilderName, $connection);
		$userStats = getProfileInformation($_SESSION['username'], $connection);

		$chestRatio = $bodybuilderStats['chest'] / $bodybuilderStats[$pinnedMuscle];
		$armRatio = $bodybuilderStats['arms'] / $bodybuilderStats[$pinnedMuscle];
		$waistRatio = $bodybuilderStats['waist'] / $bodybuilderStats[$pinnedMuscle];
		$thighRatio = $bodybuilderStats['thighs'] / $bodybuilderStats[$pinnedMuscle];
		$calfRatio = $bodybuilderStats['calves'] / $bodybuilderStats[$pinnedMuscle];

		echo "<p>Results for pinning " . $pinnedMuscle . " using " . $bodybuilderName . "</p>";


		if ($pinnedMuscle == "calves") {
			$pinnedMuscle = "leftCalf";
		} else if ($pinnedMuscle == "thighs") {
			$pinnedMuscle = "leftThigh";
		} else if ($pinnedMuscle == "arms") {
			$pinnedMuscle = "leftArm";
		}

		$resultChest = $userStats[$pinnedMuscle] * $chestRatio;
		$resultArms = $userStats[$pinnedMuscle] * $armRatio;
		$resultWaist = $userStats[$pinnedMuscle] * $waistRatio;
		$resultThighs = $userStats[$pinnedMuscle] * $thighRatio;
		$resultCalves = $userStats[$pinnedMuscle] * $calfRatio;
	}


?>

<table>
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
			echo "<td>" . $userStats['chest'] . "</td>";
			echo "<td>" . $userStats['leftArm'] . "</td>";
			echo "<td>" . $userStats['waist'] . "</td>";
			echo "<td>" . $userStats['leftThigh'] . "</td>";
			echo "<td>" . $userStats['leftCalf'] . "</td>";
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


</table>
