<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");


  if (isset($_POST['submit'])) {
    $user['username'] = !empty($_POST['username']) ? $_POST['username'] : "";
    $user['password'] = !empty($_POST['password']) ? $_POST['password'] : "";

    $errors = [];
    if (empty($user['username'])) $errors[] = "Username cannot be blank";
    if (empty($user['password'])) $errors[] = "Password cannot be blank";

    if (empty($errors)) {
      $errors[] = loginByUsername($user, $connection);
    }

    // Show validation errors
    if (!empty($errors)) {
      foreach ($errors as $opt) {
        if ($opt) {
          echo "<li>$opt</li>";
        }

      }
    }
  }



?>



  <div class="content-wrapper">
    <form action="" method="post">
      <div class="login-form">
        <label>Username:</label>
        <input class="login-input" type="text" name="username" value=""/>
        <label>Password:</label>
        <input class="login-input" type="password" name="password" value=""/>
        <input class="login-button" type="submit" name="submit" value="Submit"/>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
      </div>
    </form>
  </div>

</body>




</html>
