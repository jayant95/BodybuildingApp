<?php
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  $user = [];
  $user['first-name'] = "";
  $user['last-name'] = "";
  $user['email'] = "";
  $user['username'] = "";
  $errors = [];

  if(isset($_POST['submit'])) {
    $user['first-name'] = !empty($_POST['first-name']) ? $_POST['first-name'] : "";
    $user['last-name'] = !empty($_POST['last-name']) ? $_POST['last-name'] : "";
    $user['email'] = !empty($_POST['email']) ? $_POST['email'] : "";
    $user['username'] = !empty($_POST['username']) ? $_POST['username'] : "";
    $user['password'] = !empty($_POST['password']) ? $_POST['password'] : "";
    $user['confirm-password'] = !empty($_POST['confirm-password']) ? $_POST['confirm-password'] : "";

    $incomplete = false;
    // Check validation and if form is complete
    $errors = formValidation($user);
    if ($errors) {
      $incomplete = true;
    }

    if (!$incomplete) {
        $registeredUsername = isExistingUsername($user['username'], $connection);
        $registeredEmail = isExistingEmail($user['email'], $connection);
        if (!$registeredEmail && !$registeredUsername) {
          registerNewUser($user, $connection);
          header("Location: home.php");
        } else {
          $errors[] = $registeredUsername;
          $errors[] = $registeredEmail;
        }
    }

    $connection->close();

    if (!empty($errors)) {
      // List out form errors
      foreach ($errors as $opt) {
        echo "<li>$opt</li>";
      }
    }
  }

?>




<div class="content-wrapper">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="register-form">
      <label>First Name:</label>
      <input class="login-input" type="text" name="first-name" value="<?php echo $user['first-name'] ?>"/>
      <label>Last Name:</label>
      <input class="login-input" type="text" name="last-name" value="<?php echo $user['last-name'] ?>"/>
      <label>Email:</label>
      <input class="login-input" type="text" name="email" value="<?php echo $user['email'] ?>"/>
      <label>Username:</label>
      <input class="login-input" type="text" name="username" value="<?php echo $user['username'] ?>"/>
      <label>Password: (Password must contain at least one special character, upper & lower case letter and number)</label>
      <input class="login-input" type="password" name="password" value=""/>
      <label>Confirm Password:</label>
      <input class="login-input" type="password" name="confirm-password" value=""/>
      <input class="login-button" type="submit" name="submit" value="Submit"/>
    </div>
  </form>
</div>


<?php require("includes/footer.php") ?>
