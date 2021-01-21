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
  $path = "";
  if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // $path = "saveImages/" . urldecode($_GET['path']);
  $path = urldecode($_GET['path']);
  function deleteImage($imageId, $table_name) {
    global $handle;
    global $path;
    try {
      $sql = "DELETE FROM $table_name WHERE id='$imageId'";
      $handle->exec($sql);
      if (!unlink($path)) {
        echo "You have an error";
      }else{
        header("location: profile.php");
      }
    }catch(PDOExeption $e){
      echo "Failed to delete image ".$e->getMessage();
    }
  }
    deleteImage($id, "images");
  }


?>
