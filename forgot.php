<?php require_once 'controls.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
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
      <form class="recovery" action="forgot.php" method="POST">
        <h2>Recover Password</h2>
        <p>Please enter your email account so we can assist you in recovering you account.</p>
        <input type="email" name="recover-email" value="" placeholder="email"><br>
        <input type="submit" name="recover-btn" value="Recover my Password">
      </form>
    </div>
  </body>
</html>
