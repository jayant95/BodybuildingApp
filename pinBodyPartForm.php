<?php
	include_once("includes/db_connection.php");

	$memberID = "11";
	$goalID = "11";
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


	$leftArm = 
	*/

	// $stmt = $connection->prepare('INSERT INTO goals (memberID,goalID,bodyBuilderID) VALUES (?)');
	// $stmt->bind_param('iis', $memberID,$goalID,$bodybuilderName);

	// $stmt->execute();
	// $result = $stmt->get_result();

	// $stmt->close();

	// if (mysql_query("INSERT INTO bodybuilders VALUES('$goalID','$bodybuilderName','11','11','11','11','11','11','11','11')"))
	// 	echo "Successfully inserted";
	// else
	// 	echo "Insertion Failed";


?>