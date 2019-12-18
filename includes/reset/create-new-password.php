<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Deltoyd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel='icon' href="../../img/favicon.ico" type="image/x-icon"/>
  </head>

<body>

<div class="top-banner">
    <div class="site-title">
        <img class="site-logo" src="../../img/site-logo.png">
        <!-- Add the site logo here  -->
        <h1><a href="home.php">Deltoyd</a></h1>
    </div>

    <nav class="profile-links">
        <ul class="nav-links">
        <?php
            // Check if user is logged in
            if (empty($_SESSION['first-name'])) {
            echo "<li><a href=\"login.php\">Login</a></li>";
            echo "<li><a href=\"register.php\">Register</a></li>";
            } else {
            echo "<li><a href=\"profile.php\">Welcome " .$_SESSION['first-name']."</a></li>";
            echo "<li><a href=\"logout.php\">Logout</a></li>";
            }
        ?>
        </ul>
    </nav>
</div>

<?php
  $selector = $_GET['selector'];
  $validator = $_GET['validator'];

  if (empty($selector) || empty($validator)) {
      echo "Could not validate your request";
  } else {
      if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
        ?>

        <div class="login-wrapper">
            <div class="container-login background-image overlay">
                    <div class="wrap-login">
                        <form class="login-form" action="../reset-password.php", method="POST">
                            <h3 class="login-header">Create new password</h3>
                            <input type="hidden" name="selector" value="  <?php echo $selector ?>  "/>;
                            <input type="hidden" name="validator" value=" <?php echo $validator ?>  "/>;
                            <div class="wrap-input">
                                <input class="form-input" type="password" name="password" placeholder="Please enter your new password">
                            </div>
                            
                            <div class="wrap-input">
                                <input class="form-input" type="password" name="password-confirm" placeholder="Please enter your password again.">
                            </div>
                            
                            <div class="login-form-btn">
                                <input class="login-button" type="submit" name="reset-password-submit" value="Reset password">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <?php require("../footer.php");
      }
  }
?>


