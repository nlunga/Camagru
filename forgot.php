<?php require_once 'controls.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <style>
      a {
        text-decoration: none;
      }

      .header {
        background-color: #eafbea;
        width: 100%;
        height: 75px;
        border: 1px solid black;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      body{
        margin: 0;
      }

      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <a href="index.php"><h1>Camagru</h1></a>
    </div>
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
    <div class="footer">
      <p>@nlunga 2019</p>
    </div>
  </body>
</html>
