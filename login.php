<?php require_once 'controls.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
    <style>
      a {
        text-decoration: none;
      }
      
      body{
        margin: 0;
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
      <form class="sign" action="login.php" method="POST">
        <input type="text" name="username-email" value="<?php echo $username_email; ?>" placeholder="Email or username"><br>
        <input type="password" name="log-passwd" value="" placeholder="Password"><br>
        <input type="submit" name="login-btn" value="Log In"><br>
        <a href="forgot.php">Forgot Password?</a>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
      </form>
    </div>
    <div class="footer">
      <p>@nlunga 2019</p>
    </div>
  </body>
</html>
