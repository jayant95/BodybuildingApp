<?php

  function formValidation($user) {
    $errors = [];
    $list_errors = [
      "first-name" => "First name is required",
      "last-name" => "Last name is required",
      "email" => "Email is required",
      "username" => "Username is required",
      "password" => "Password cannot be blank",
      "confirm-password" => "Please confirm your password"
    ];

    // Loop through the error list
    foreach ($list_errors as $val) {
      // Find the key associated with the error message
      $key = array_search($val, $list_errors);
      // Use the key from list_errors to check the user array if the same key in that array is empty
      if (empty(trim($user[$key]))) {
        // Add the error message to the error array
        $errors[] = $list_errors[$key];
      }
    }

    // Check if the password and confirm password entry is the same
    if ($user['password'] != $user['confirm-password']) {
      $errors[] = "Passwords must match";
    }

    if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,50}$/', $user['password'])) {
      $errors[] = 'Password does not meet the requirements!';
    }

    // Return the array of errors
    return $errors;
  }


  function registerNewUser($user, $connection) {
    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    $stmt = $connection->prepare('INSERT INTO members (firstName, lastName, email, username, password) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('sssss', $user['first-name'], $user['last-name'], $user['email'], $user['username'], $hashed_password);

    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();

    $_SESSION['first-name'] = $user['first-name'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['memberID'] = getMemberID($user['username'], $connection);
    $path = 'includes/uploads/' . $_SESSION['username'] . "/" . date('F');
    mkdir($path, 0777, true);
  }

  function getMemberID($username, $connection) {
    $memberID = -1;

    if ($stmt = $connection->prepare('SELECT memberID FROM members WHERE username = ? LIMIT 1')) {
      $stmt->bind_param('s', $username);
      $stmt->execute();
    } else {
      $error = $connection->errno . ' ' . $connection->error;
      echo $error;
    }

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $memberID = $row['memberID'];
    }

    return $memberID;
  }

  function isExistingUser($data, $connection, $column) {
    $error = "";

    $stmt = $connection->prepare("SELECT * FROM members WHERE " .$column. " = ?");
    $stmt->bind_param('s', $data);

    $stmt->execute();

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      if ($row[$column] == $data) {
        $error = "The " .$column. " you entered already exists.";
        break;
      }
    }

    $stmt->close();

    return $error;
  }

  function loginByUsername($user, $connection) {
    $error = "";
    $validUsername = false;

    $stmt = $connection->prepare('SELECT * FROM members WHERE username = ? LIMIT 1');
    $stmt->bind_param('s', $user['username']);

    $stmt->execute();

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $validUsername = true;
      if ($row['username'] == $user['username']) {
        if (password_verify($user['password'], $row['password'])) {
          session_regenerate_id();

          $_SESSION['memberID'] = $row['memberID'];
          $_SESSION['first-name'] = $row['firstName'];
          $_SESSION['username'] = $row['username'];

          header("Location: home.php");
        } else {
          $error = "This password is incorrect";
        }
      } else {
        $error = "This username is invalid";
      }
    }

    if (!$validUsername) $error = "This username is invalid";

    $stmt->close();
    $connection->close();

    return $error;
  }

  function getProfileInformation($username, $connection) {
    $user_profile = [];

    if ($stmt = $connection->prepare('SELECT * FROM members WHERE username = ? LIMIT 1')) {
      $stmt->bind_param('s', $username);
      $stmt->execute();
    } else {
      $error = $connection->errno . ' ' . $connection->error;
      echo $error;
    }

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $user_profile['first-name'] = $row['firstName'];
      $user_profile['last-name'] = $row['lastName'];
      $user_profile['email'] = $row['email'];
      $user_profile['username'] = $row['username'];
      $user_profile['leftArm'] = $row['leftArm'];
      $user_profile['rightArm'] = $row['rightArm'];
      $user_profile['chest'] = $row['chest'];
      $user_profile['waist'] = $row['waist'];
      $user_profile['leftThigh'] = $row['leftThigh'];
      $user_profile['rightThigh'] = $row['rightThigh'];
      $user_profile['leftCalf'] = $row['leftCalf'];
      $user_profile['rightCalf'] = $row['rightCalf'];
      $user_profile['shoulders'] = $row['shoulders'];
      $user_profile['neck'] = $row['neck'];
      $user_profile['knee'] = $row['knee'];
      $user_profile['wrists'] = $row['wrists'];
      $user_profile['ankles'] = $row['ankles'];
      $user_profile['bodyFat'] = $row['bodyFat'];
      $user_profile['weight'] = $row['weight'];
    }

    $stmt->close();

    return $user_profile;
  }

  function saveUserProfileLog($user, $connection) {
    $date = time();
    $sql = "INSERT INTO memberlog (memberID, timestamp, leftArm, rightArm, chest, waist, leftThigh, rightThigh, leftCalf, rightCalf, shoulders, weight, bodyFat, neck) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);

    if ($query = $connection->prepare($sql)) {
       $stmt->bind_param('dddddddddddddd', $_SESSION['memberID'], $date, $user['leftArm'], $user['rightArm'], $user['chest'], $user['waist'], $user['leftThigh'], $user['rightThigh'], $user['leftCalf'],
         $user['rightCalf'], $user['shoulders'], $user['weight'], $user['bodyFat'], $user['neck']);
      $stmt->execute();

    } else {
      $error = $connection->errno . ' ' . $connection->error;
      echo $error;
    }

    $stmt->close();
  }

  function updateUserProfile($user, $connection) {
    $sql = "UPDATE members SET leftArm = ?, rightArm = ?, chest = ?, waist = ?, leftThigh = ?, rightThigh = ?,
      leftCalf = ?, rightCalf = ?, shoulders = ?, neck = ?, weight = ?, bodyFat = ?, wrists = ?, ankles = ?, knee = ?
      WHERE username = ?";

    $stmt = $connection->prepare($sql);
    if ($query = $connection->prepare($sql)) {
      $stmt->bind_param('ddddddddddddddds',$user['leftArm'], $user['rightArm'], $user['chest'], $user['waist'], $user['leftThigh'], $user['rightThigh'], $user['leftCalf'],
        $user['rightCalf'], $user['shoulders'], $user['neck'], $user['weight'], $user['bodyFat'], $user['wrists'], $user['ankles'], $user['knee'], $_SESSION['username']);

      $stmt->execute();

    } else {
      $error = $connection->errno . ' ' . $connection->error;
      echo $error;
    }

    $stmt->close();
  }

  function getUserMeasurementLog($userID, $connection) {
    $user_log = [];
    $row_count = 0;

    if ($stmt = $connection->prepare('SELECT * FROM memberlog WHERE memberID = ?')) {
      $stmt->bind_param('s', $userID);
      $stmt->execute();
    } else {
      $error = $connection->errno . ' ' . $connection->error;
      echo $error;
    }

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $user_row = [];
      $user_row['timestamp'] = $row['timestamp'];
      $user_row['leftArm'] = $row['leftArm'];
      $user_row['rightArm'] = $row['rightArm'];
      $user_row['chest'] = $row['chest'];
      $user_row['waist'] = $row['waist'];
      $user_row['leftThigh'] = $row['leftThigh'];
      $user_row['rightThigh'] = $row['rightThigh'];
      $user_row['shoulders'] = $row['shoulders'];
      $user_row['neck'] = $row['neck'];
      $user_row['leftCalf'] = $row['leftCalf'];
      $user_row['rightCalf'] = $row['rightCalf'];
      $user_row['weight'] = $row['weight'];
      $user_row['bodyFat'] = $row['bodyFat'];

      $user_log[$row_count] = $user_row;
      $row_count++;
    }

    return $user_log;
  }

  function getBodybuilderStats($bodybuilderName, $connection) {
    $stats = [];
    $likeString = '%' . $bodybuilderName . '%';
    $sql = "SELECT * FROM bodybuilders WHERE name LIKE ? LIMIT 1";

    if ($stmt = $connection->prepare($sql)) {
      $stmt->bind_param('s', $likeString);
      $stmt->execute();
    } else {
      $error = $connection->errno . ' ' . $connection->error;
      echo $error;
    }

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $stats['name'] = $row['name'];
      $stats['height'] = $row['height'];
      $stats['contestWeight'] = $row['contestWeight'];
      $stats['offseasonWeight'] = $row['offseasonWeight'];
      $stats['arms'] = $row['arms'];
      $stats['chest'] = $row['chest'];
      $stats['waist'] = $row['waist'];
      $stats['thighs'] = $row['thighs'];
      $stats['calves'] = $row['calves'];
    }

    $stmt->close();

    return $stats;
  }

  function getBodybuilderNames($connection) {
    $bodybuilderName = [];
    $sql = "SELECT name, nameCode FROM bodybuilders";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $bodybuilderName[$row['nameCode']] = $row['name'];
      }
    }

    return $bodybuilderName;
  }

  function getBodybuilderMuscleRatio($bodybuilder, $connection) {
    $muscleRatio = 1;
    $sql = "SELECT "  . $bodybuilder['fromMuscle'] . ", " . $bodybuilder['resultMuscle'];
    $sql .= " FROM bodybuilders WHERE nameCode = '" . $bodybuilder['nameCode'] . "'";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $muscleRatio = $row[$bodybuilder['fromMuscle']] / $row[$bodybuilder['resultMuscle']];
      }
    }

    return $muscleRatio;
  }

?>
