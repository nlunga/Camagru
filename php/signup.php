<?php
  require_once("controllers.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
  </head>
  <body>
    <center>
      <div class="form-container">
        <form class="myForm" action="signup.php" method="post">
          <h3 class="reg">Register</h3>
          <!--<div class="alert"></div>-->
          <input class="focus-control" type="email" name="user-email" id="input-mail" value="<?php /*echo $Email; */?>" oninput="checkInput()" placeholder="Email"> <br>
          <input class="focus-control" type="text" name="fullname" id="input-name" value="<?php /*echo $Name; */?>" oninput="checkInput()" placeholder="Full Name"> <br>
          <input class="focus-control" type="text" name="username" id="input-username" value="<?php /*echo $UserName; */?>" oninput="checkInput()" placeholder="Username"> <br>
          <input class="focus-control" type="password" name="passwd" id="input-password" value="<?php /*echo $PasswordUserInput;*/ ?>" oninput="checkInput()" placeholder="Password"> <br>
            <input class="focus-control" type="password" name="confPasswd" id="input-confpassword" value="<?php /*echo $ConfirmUserPassword;*/ ?>" oninput="checkInput()" placeholder="Confirm Password"> <br>
          <input type="submit" id="sign_up" class="submit-button" name="submit" value="Sign up" disabled>
        </form>
        <p class="sign">By signing up, you agree to our <br><strong>Terms</strong> , <strong>Data Policy</strong> and <strong>Cookies</strong> <br>Policy .</p>
      </div>
      <div class="log">
        <p>Have an account? <a href="login.php">Log in</a></p>
      </div>
    </center>
    <script type="text/javascript" src="../js/form-validation.js"></script>
  </body>
</html>
