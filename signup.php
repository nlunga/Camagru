<?php
  require_once 'controls.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
  </head>
  <body>
    <div class="form-container">
      <div class="error_message">
        <?php
          if (count($error)>0) {
            echo "<ul>";
            foreach ($error as $errors) {
              echo "<li>" . $errors . "</li><br>";
            }
            echo "</ul>";
          }
        ?>
      </div>
      <form class="sign" action="signup.php" method="POST">
        <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Prefered username"><br>
        <input type="email" name="user-email" value="<?php echo $userEmail; ?>" placeholder="Email"><br>
        <input type="password" name="passwd" value=""  placeholder="Password"><br>
        <input type="password" name="confPasswd" value="" placeholder="Confirm Password"><br>
        <input type="submit" name="submit" value="Sign up"><br>
        <p>Have an account? <a href="login.php">Log in</a></p>
      </form>
    </div>
  </body>
</html>
