<?php
  /*
  $emailError = "";
  $nameError = "";
  $usernameError = "";
  $passwordError = "";

  function test_ user_input ($data) {
    return $data;
  }

  if (isset($_POST['submit'])) {
    if (empty($_POST['user-email'])) {
      $emailError = 'Email is required';
    }else {
      $Email = test_user_input($_POST['user-email']);
    }

    if (empty($_POST['fullname'])) {
      $nameError = 'Full Name is required';
    }else {
      $Name = test_user_input($_POST['fullname']);
      if (!preg_match("/^[A-Za-z. ]*$/", $Name)) {
        $nameError = "Only letters and white spaces are allowed";
      }
    }
    if (empty($_POST['username'])) {
      $usernameError = 'Username is required';
    }else {
      $UserName = test_user_input($_POST['username']);
    }
    if (empty($_POST['passwd'])) {
      $passwordError = 'Password is required';
    }else {
      $Password = test_user_input($_POST['passwd']);
    }
  }*/
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
        <form class="myForm" action="index.php" method="post">
          <input type="email" name="user-email" id="input-mail" value="" oninput="checkInput()" placeholder="Email"> *<?php echo $emailError; ?><br>
          <input type="text" name="fullname" id="input-name" value="" oninput="checkInput()" placeholder="Full Name"> *<?php echo $nameError; ?><br>
          <input type="text" name="username" id="input-username" value="" oninput="checkInput()" placeholder="Username"> *<?php echo $usernameError; ?><br>
          <input type="password" name="passwd" id="input-password" value="" oninput="checkInput()" placeholder="Password"> *<?php echo $passwordError; ?><br>
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
