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

  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Camagru</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css" media="all" />
  </head>
  <body>
    <div id="header">
      <div id="logo">
        <h1>Camagru</h1>
      </div>
      <div id="nav">
        <a href="signup.php">Sign Up</a>
        <a href="login.php">Log in</a>
        <?php if (isset($_SESSION['verified'])): ?>
          <a href="profile.php">My Profile</a>
          <a href="index.php?logout=1">Log out</a>
        <?php endif; ?>
      </div>
    </div>
    <div id="container">
      
    </div>
  </body>
</html>
