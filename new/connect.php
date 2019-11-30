<?php
  require_once 'config/database.php';

  $host = "mysql:host=".DB_HOST;
  $user = DB_USER;
  $pass = DB_PASS;
  $handle = "";
  try {
    $handle = new PDO("$host", "$user", "$pass");
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die("Oops. Something went wrong in the database ");
  }

?>
