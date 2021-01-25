<?php
  require_once '../config/database.php';
  function initial_connection () {
    $host = "mysql:host=".DB_HOST;
    $user = DB_USER;
    $pass = DB_PASS;
    $handle = "";
    try {
      $handle = new PDO("$host", "$user", "$pass");
      $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      // die("Oops. Something went wrong in the database ");
      echo 'Oops. Something went wrong in the database'.$e->getMessage();
    }
    return $handle;
  }

  function connection() {
    $host = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;
    $handle = "";
    try {
      $handle = new PDO("$host", "$user", "$pass");
      $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      // die("Oops. Something went wrong in the database ");
      echo 'Oops. Something went wrong in the database'.$e->getMessage();
    }
    return $handle;
  }

?>
