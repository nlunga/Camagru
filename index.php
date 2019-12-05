<?php
  require_once 'controls.php';

  if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
  }

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }else {
    $page = 1;
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
        <?php if (!isset($_SESSION['verified'])): ?>
          <a class="tab" href="signup.php">Sign Up</a>
          <a class="tab" href="login.php">Log in</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['verified'])): ?>
          <a class="tab" href="profile.php">My Profile</a>
          <a class="tab" href="index.php?logout=1">Log out</a>
        <?php endif; ?>
      </div>
    </div>
    <div id="container">
      <?php
        require_once 'imageInsert.php';
        publicImage("images", $page);
      ?>
    </div>
  </body>
</html>
