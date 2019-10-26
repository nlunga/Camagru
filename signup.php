<?php
  require 'controls.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
  </head>
  <body>
    <div class="form-container">
      <form class="sign" action="signup.php" method="POST">
        <input type="text" name="username" value="" placeholder="Prefered username"><br>
        <input type="text" name="user-email" value="" placeholder="Email"><br>
        <input type="password" name="passwd" value="" placeholder="Password"><br>
        <input type="password" name="confPasswd" value="" placeholder="Confirm Password"><br>
        <input type="submit" name="submit" value="Sign up"><br>
        <p>Have an account? <a href="login.php">Log in</a></p>
      </form>
    </div>
  </body>
</html>
