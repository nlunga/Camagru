<?php
  require '../connect.php';

  $new_users = "new_users";

  function delete_db($database, $handle)
  {
    try {
      $found = "DROP DATABASE IF EXISTS " . $database;
      $handle->exec($found);
      echo "Database deleted ...<br>";
    } catch (PDOException $e) {
      echo "Database drop failed ".$e->getMessage();
    }
  }

  function create_db($database, $handle)
  {
    try {
      $sql = "CREATE DATABASE " . $database;
      $handle->exec($sql);
      echo "Database created successfully<br>";
    } catch (PDOException $e) {
      echo "Database creation failed ".$e->getMessage();
    }
  }

  function create_table($table_name, $handle)
  {
    try {
      $sql = "CREATE TABLE $table_name (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL UNIQUE,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255),
        verified TINYINT(4) NOT NULL,
        token VARCHAR(100) NOT NULL
      )";
      $handle->exec($sql);
      echo "Table $table_name created successfully<br>";
    } catch (PDOException $e) {
      echo "Table creation failed ".$e->getMessage();
    }
  }
  /*Regiter_Date timestamp NOT NULL*/

  function delete_table($table_name, $handle)
  {
    try {
      $sql = "DROP TABLE $table_name";
      $handle->exec($sql);
      echo "Table $table_name deleted successfully<br>";
    } catch (PDOException $e) {
      echo "Table drop failed ".$e->getMessage();
    }
  }

  delete_db(DB_NAME, $handle);
  create_db(DB_NAME, $handle);
  require '../reconnect.php';
  create_table($new_users, $handle);
?>
