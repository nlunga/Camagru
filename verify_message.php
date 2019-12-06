<?php
  require_once 'controls.php';

  if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
  }

  if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
  }

  if (!isset($_SESSION['id'])) {
    header('location: signup.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['username'];?></title>
    <style>
      a {
        text-decoration: none;
      }

      .header {
        margin: 0;
        padding: 3px;
        text-align: center;
        background: #1abc9c;
        color: white;
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
    <?php if (isset($_SESSION['message'])): ?>
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
    <?php endif; ?>
    <h3>Welcome <?php echo $_SESSION['username']; ?></h3>
    <?php if (!$_SESSION['verified']):?>
      <div class="verify">
        You need to verify your account.
        Sign in with your email account and click on the
        verification link we just emailed you at
        <strong><?php echo $_SESSION['email']; ?></strong>
      </div>
    <?php endif; ?>
    <?php if ($_SESSION['verified']): ?>
      <form class="" action="" method="">
        <input type="submit" name="ver" value="I am Verified">
      </form>
    <?php endif; ?>
    <p>You are logged in as <?php echo $_SESSION['username']; ?> <a href="index.php?logout=1">Log out</a> </p>
    <div class="footer">
      <p>@nlunga 2019</p>
    </div>
  </body>
</html>
