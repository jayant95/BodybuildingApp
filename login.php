<?php
  session_start();
  require("includes/header.php")
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
