<?php
  session_start();
  require_once("includes/header.php");
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
  }


  if (isset($_SESSION['message'])) {
    echo "<div class='site-message'>";
    echo "<p>" . $_SESSION['message'] . "</p>";
    echo "</div>";
    unset($_SESSION['message']);
  }

?>


  <div class="login-wrapper">
    <div class="container-login background-image overlay">
			<div class="wrap-login">
				<form class="login-form" action="", method="POST">
          <h3 class="login-header">Login</h3>
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
						<input class="form-input" type="text" name="username" placeholder="Username">
					</div>

					<div class="wrap-input">
						<input class="form-input" type="password" name="password" placeholder="Password">
					</div>
					
					<div class="login-form-btn">
            <input class="login-button" type="submit" name="submit" value="Submit">
					</div>

					<div class="login-form-link">
            <a class="register-link" href="reset-password.php">Forgot your password?</a>
            <p>Not a member? <a class="register-link" href="register.php">Sign up here</a></p>
          </div>
        </form>
			</div>
		</div>
    <!-- <div class="login-panel login-box">
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
    </div> -->
  </div>





<?php require("includes/footer.php"); ?>
