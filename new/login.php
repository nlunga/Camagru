<?php require_once 'controls.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
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
      <form class="sign" action="login.php" method="POST">
        <input type="text" name="username-email" value="<?php echo $username_email; ?>" placeholder="Email or username"><br>
        <input type="password" name="log-passwd" value="" placeholder="Password"><br>
        <input type="submit" name="login-btn" value="Log In"><br>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
      </form>
    </div>
  </body>
</html>
