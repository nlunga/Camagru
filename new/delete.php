<?php
  require_once 'reconnect.php';

  function delete_data($table_name, $handle, $user_id)
  {
    try {
      $found = "DELETE FROM $table_name WHERE id='$user_id'";
      $handle->exec($found);
      echo "Record deleted successfully<br>";
    } catch (PDOException $e) {
      echo "Database drop failed ".$e->getMessage();
    }
  }
?>
