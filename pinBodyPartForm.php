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
		$goalID = "11";
		// $memberID = "111";
		// chosen bodybuilder has the 'name' attribute associated w hidden input
		$bodybuilderName = $_POST['bodybuilder'];

		$leftArm = $_SESSION['leftArm'];
		$rightArm = $_SESSION['rightArm'];
		$chest = $_SESSION['chest'];
		$waist = $_SESSION['waist'];
		$leftThigh = $_SESSION['leftThigh'];
		$rightThigh = $_SESSION['rightThigh'];
		$leftCalf = $_SESSION['leftCalf'];
		$rightCalf = $_SESSION['rightCalf'];
		$shoulders = $_SESSION['shoulders'];
		$weight = $_SESSION['weight'];
		$bodyFat = $_SESSION['bodyFat'];
		
		$stmt = $connection->prepare('INSERT INTO goals (memberID,goalID,bodyBuilderID,featureName,date,leftArm,rightArm,chest,waist,leftThigh,rightThigh,leftCalf,rightCalf,shoulders,weight,bodyFat) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
		$stmt->bind_param('iisssiiiiiiiiiii', $memberID,$goalID,$bodybuilderName,$featureName,$date,$leftArm,$rightArm,$chest,$waist,$leftThigh,$rightThigh,$leftCalf,$rightCalf,$shoulders,$weight,$bodyFat);

		$stmt->execute();
		$result = $stmt->get_result();

				echo $bodybuilderName;
		echo $memberID;
	}


?>