<?php
  require 'reconnect.php';

  function insertImage($newUserId, $userImage)
  {
    global $handle;
    try {
      $sql = "INSERT INTO images(images, userId) VALUES (:images, :userId)";
      $stmt = $handle->prepare($sql);
      $stmt->bindParam(':images', $userImage);
      $stmt->bindParam(':userId', $newUserId);
      $stmt->execute();
    } catch (PDOException $e) {
        echo "Image failed to upload --->>>>".$e->getMessage();
    }
  }

  function insertProfileImage($newUserId, $userProfileImage)
  {
    global $handle;
    try {
      $sql = "INSERT INTO profile(profile_pic, userId) VALUES (:profile_pic, :userId)";
      $stmt = $handle->prepare($sql);
      $stmt->bindParam(':profile_pic', $userProfileImage);
      $stmt->bindParam(':userId', $newUserId);
      $stmt->execute();
    } catch (PDOException $e) {
        echo "Image failed to upload".$e->getMessage();
    }
  }

  function getImage($table_name)
  {
    global $handle;

    try {
        $sql = "SELECT * FROM $table_name";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        echo "<table><tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<td>";
          echo '<img src="data:imagejpeg;base64,'.base64_encode($row['image1']).'" height="100" width="100" alt="">';
          echo "</td>";
        }
        echo "</tr></table>";

    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }

  }
?>
