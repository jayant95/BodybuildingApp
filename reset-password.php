<?php
  session_start();
  require_once("includes/header.php");
  require_once("includes/db_connection.php");
?>


  <div class="login-wrapper">
    <div class="container-login background-image overlay">
			<div class="wrap-login">
				<form class="login-form" action="includes/reset-request.php", method="POST">
          <h3 class="login-header">Reset Password</h3>
          <?php
            // Show validation errors
            if (!empty($validationErrors)) {
              echo "<div class='validation-msg'>";
              foreach ($validationErrors as $err) {
                if ($err) {
                  echo "<li>$err</li>";
                }
              }
              echo "</div>";
            }
          ?>
					<div class="wrap-input">
						<input class="form-input" type="text" name="email" placeholder="Please enter your email">
					</div>
					
					<div class="login-form-btn">
              <input class="login-button" type="submit" name="reset-request-submit" value="Submit">
					</div>

					<div class="login-form-link">
            <p>Not a member? <a class="register-link" href="register.php">Sign up here</a></p>
          </div>
        </form>
          <?php 
          if (isset($_GET["reset"])) {
              echo "<div class='validation-msg'>";
              if (($_GET["reset"]) == "success") {
                  echo '<p>Please check your email for the link to change your password</p>';
              } else {
                  echo '<p>The information entered did not match out system</p>';
              }
              echo "</div>";
          }

          ?>

			</div>
		</div>
  </div>





<?php require("includes/footer.php"); ?>
