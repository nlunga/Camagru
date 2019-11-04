<?php
  require_once 'config/database.php';

  $host = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
  $user = DB_USER;
  $pass = DB_PASS;
  $handle = "";
  try {
    $handle = new PDO("$host", "$user", "$pass");
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
  } catch (PDOException $e) {
    echo "DED";
    die("Oops. Something went wrong in the database ");
  }

?>
