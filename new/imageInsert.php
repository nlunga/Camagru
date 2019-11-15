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
        echo "Image failed to upload".$e->getMessage();
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
  // insertProfileImage($_SESSION['id'], $_FILES["profile-photo"]["name"]);
?>
