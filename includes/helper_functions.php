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

    $stmt = $connection->prepare('SELECT * FROM members WHERE username = ? LIMIT 1');
    $stmt->bind_param('s', $username);

    $stmt->execute();

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
      $user_profile['wrists'] = $row['wrists'];
      $user_profile['ankles'] = $row['ankles'];
      $user_profile['bodyFat'] = $row['bodyFat'];
    }

    $stmt->close();

    return $user_profile;
  }

?>
