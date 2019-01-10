<?php require("includes/header.php") ?>

<div class="content-wrapper">
  <form action="" method="post">
    <div class="register-form">
      <label>First Name:</label>
      <input class="login-input" type="text" name="first-name" value=""/>
      <label>Last Name:</label>
      <input class="login-input" type="text" name="last-name" value=""/>
      <label>Email:</label>
      <input class="login-input" type="text" name="email" value=""/>
      <label>Username:</label>
      <input class="login-input" type="text" name="username" value=""/>
      <label>Password:</label>
      <input class="login-input" type="password" name="password" value=""/>
      <label>Confirm Password:</label>
      <input class="login-input" type="password" name="password-confirm" value=""/>
      <input class="login-button" type="submit" name="submit" value="Submit"/>
    </div>
  </form>
</div>


<?php require("includes/footer.php") ?>
