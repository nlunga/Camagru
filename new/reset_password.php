<?php require_once 'controls.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reset Password</title>
  </head>
  <body>
    <div class="error_message">
      <?php
        if (count($error)>0) {
          echo "<ul>";
          foreach ($error as $errors) {
            echo "<li>" . $errors . "</li><br>";
          }
          echo "</ul>";
          //echo now();
        }
      ?>
    </div>
    <div class="form-container">
      <form class="sign" action="reset_password.php" method="POST">
        <h3>Confirm Password</h3>
        <input type="password" name="passwd" value="" placeholder="Password"><br>
        <input type="password" name="con-passwd" value="" placeholder="Confirm Password"><br>
        <input type="submit" name="resetPassword-btn" value="Reset Password"><br>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
      </form>
    </div>
  </body>
</html>
