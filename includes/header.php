<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Deltoyd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel='icon' href="img/favicon.ico" type="image/x-icon"/>
  </head>


  <body>

  <div class="top-banner">
    <div class="site-title">
      <img class="site-logo" src="img/site-logo.png">
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

  <!-- <div class="content-wrapper"> -->
