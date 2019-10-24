<?php

  try {
    $handle = new PDO("mysql:host=$server;dbname=$db", "$user", "$pass");
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
  } catch (PDOException $e) {
    die("Oops. Something went wrong in the database ");
    echo $e->getMessage();
  }

?>
