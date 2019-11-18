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

  function getImage($table_name, $userId)
  {
    global $handle;

    try {
        $sql = "SELECT * FROM $table_name WHERE userId='$userId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        echo "<table><tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<td>";
          $temp = explode("_", $row['images']);
          echo '<img  src="saveImages/'.$temp[1] . '" height="250" width="250" alt="fail">';
          echo "<br>";
          ?><a href="delete.php?id=<?php echo $row["id"]; ?>&path=<?php echo $temp[1]; ?>">Delete</a>
          <?php echo "</td><br>";
        }
        echo "</tr></table>";

    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }

  }

  function publicImage($table_name)
  {
    global $handle;

    try {
        $sql = "SELECT * FROM $table_name";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        echo "<table><tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<td>";
          $temp = explode("_", $row['images']);
          echo '<img  src="saveImages/'.$temp[1] . '" height="250" width="250" alt="fail">';
          echo "<br>";
          echo "</td><br>";
        }
        echo "</tr></table>";
    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }

  }
?>
