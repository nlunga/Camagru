<?php
  require_once 'controls.php';
  $username = "";
  $picture = "";
  if (isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
    $picture = $_SESSION['username']."-pic";
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $username?></title>
  </head>
  <body>
    <img style="border-radius: 50%;" width="250" height="250" name="<?php echo $picture; ?>" src="resources/noavatar.png" alt="unsplash"><br>
    <input type="file" name="profile-photo" value="">
    hi <?php echo $username;?>
  </body>
</html>
