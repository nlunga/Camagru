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
  $id = "";
  if (isset($_GET['id'])) {
  $id = $_GET['id'];
  function deleteImage($imageId, $table_name) {
    global $handle;
    try {
    $sql = "DELETE FROM $table_name WHERE id='$imageId'";
    $handle->exec($sql);
    }catch(PDOExeption $e){
      echo "Failed to delete image ".$e->getMessage();
    }
  }


    deleteImage($id, "images");
    header("location: profile.php");
  }

  
?>