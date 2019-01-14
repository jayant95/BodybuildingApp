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

?>
