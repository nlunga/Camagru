<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
  </head>
  <body>
    <center>
      <div class="form-container login">
        <form class="myForm" action="login.php" method="post">
          <h3 class="reg">Login</h3>
          <!--<div class="alert"></div>-->
          <input class="focus-control" type="email" name="username-email" id="input-mail" value="" oninput="checkInput()" placeholder="Email or Username"> <?php echo $emailError; ?><br>
          <input class="focus-control" type="password" name="passwd" id="input-password" value="" oninput="checkInput()" placeholder="Password"> <?php echo $passwordError; ?><br>
          <input type="submit" id="log_in" class="login-button" name="login" value="Login" disabled>
          <p>Not yet a member? <a href="signup.php">Sign up</a></p>
        </form>
      </div>
      <div class="log">

      </div>
    </center>
    <script type="text/javascript" src="../js/form-validation.js"></script>
  </body>
</html>
