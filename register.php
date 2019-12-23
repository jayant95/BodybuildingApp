<?php
  session_start();
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
        $isRegisteredEmail = isExistingUser($user['email'], $connection, "email");
        $isRegisteredUsername = isExistingUser($user['username'], $connection, "username");
        if (!$isRegisteredEmail && !$isRegisteredUsername) {
          registerNewUser($user, $connection);
          header("Location: home.php");
        } else {
          if ($isRegisteredEmail != NULL) {
            $errors[] = $isRegisteredEmail;
          }
          if ($isRegisteredUsername != NULL) {
            $errors[] = $isRegisteredUsername;
          }
        }
    }

    $connection->close();
  }

?>
<div class="login-wrapper">
  <div class="container-login background-image overlay">
			<div class="wrap-login">
				<form class="login-form" action<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
          <h3 class="login-header">Register</h3>
                    
          <?php
            // Show validation errors
            if (!empty($errors)) {
              echo "<div class='validation-msg'>";
              foreach ($errors as $opt) {
                if ($opt) {
                  echo "<li>$opt</li>";
                }
              }
              echo "</div>";
            }
          ?>

					<div class="wrap-input">
          <label class="input-label">First Name</label>
						<input class="form-input" type="text" name="first-name" placeholder="Bob" value="<?php echo $user['first-name'] ?>">
					</div>

					<div class="wrap-input">
            <label class="input-label">Last Name</label>
						<input class="form-input" type="text" name="last-name" placeholder="Smith" value="<?php echo $user['last-name'] ?>">
          </div>
          
          <div class="wrap-input">
            <label class="input-label">Email</label>
						<input class="form-input" type="text" name="email" placeholder="abc@abc.com" value="<?php echo $user['email'] ?>">
          </div>
          
          <div class="wrap-input">
            <label class="input-label">Username</label>
						<input class="form-input" type="text" name="username" placeholder="Bobby007" value="<?php echo $user['username'] ?>">
					</div>
					
          <div class="wrap-input">
            <label class="input-label">Password</label>
            <label class="input-label small">Minimum of 8 characters. At least one captial letter, lowercase letter, special character and number</label>
            <input class="form-input" type="password" name="password" value="" placeholder="">
          </div>

          <div class="wrap-input">
            <label class="input-label">Confirm Password</label>
            <input class="form-input" type="password" name="confirm-password" value="" placeholder="">
          </div>
          
          <div class="login-form-btn">
            <input class="login-button" type="submit" name="submit" value="Submit">
					</div>

					<div class="login-form-link">
            <p>Have an account? <a class="register-link" href="login.php">Sign in here</a></p>
          </div>
				</form>
			</div>
  </div>
</div>


<!-- <div class="content-wrapper">
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
</div> -->


<?php require("includes/footer.php") ?>
