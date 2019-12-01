<?php
    function addComment($table_name, $imageId, $comment, $userId, $username)
    {
      global $handle;
      try {
        $sql = "INSERT INTO $table_name (comments, imageId, userId, username) VALUES (:comments, :imageId, :userId, :username)";
        $stmt = $handle->prepare($sql);
        $stmt->bindParam(':comments', $comment);
        $stmt->bindParam(':imageId', $imageId);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
      } catch (PDOException $e) {
          echo "Unable to insert data ".$e->getMessage();
      }
    }

    function updateLikes($table_name, $userId)
    {
      global $handle;
      try {
        $sql = "UPDATE new_users SET likes=0 WHERE userId='$userId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        // unset($_GET['clicked']);
      } catch (PDOException $e) {
        echo "Update query Failed ".$e->getMessage();
      }
    }

    function checkNumLikes($table_name,$likes, $imageId, $userId)
    {
      global $handle;
      try {
        $sql = "SELECT * FROM $table_name WHERE userId='$userId' LIMIT 1";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row_count = $stmt->rowCount();
        if ($row_count > 0) {
          updateLikes($table_name, $userId);
        }else {
          // addLike('likes', $_GET['clicked'], $_GET['id'], $_GET['userId']);
          addLike($table_name, $likes, $imageId, $userId);
        }
      } catch (PDOException $e) {
        echo "Failed to access the Database ".$e->getMessage();
      }
    }

    function addLike($table_name, $likes, $imageId, $userId)
    {
      global $handle;
      try {
        $sql = "INSERT INTO $table_name (likes, imageId, userId) VALUES (:likes, :imageId, :userId)";
        $stmt = $handle->prepare($sql);
        $stmt->bindParam(':likes', $likes);
        $stmt->bindParam(':imageId', $imageId);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
      } catch (PDOException $e) {
          echo "Unable to insert data ".$e->getMessage();
      }
    }

    function getPostUser($table_name, $userId) {
      global $handle;
      $sql = "SELECT * FROM $table_name WHERE id='$userId' LIMIT 1";
      $stmt = $handle->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row['username'];
    }

    function getComment($table_name, $imageId, $userId, $secTable)
    {
      global $handle;
      try {
        $sql = "SELECT * FROM $table_name WHERE imageId = '$imageId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        
        // $theUser = getPostUser($secTable, $userId);
        // echo "<table><tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // echo "<td>";
            echo $row['username'].": ".$row['comments'];
            // echo "</td><br>";
             echo "<br>";
        }
        // echo "</tr></table>";
      } catch (PDOException $e) {
            echo "Unable to get comment " . $e->getMessage();
      }

    }

    function getLikes($table_name, $imageId, $numOfLikes) {
      global $handle;
      try {
        $sql = "SELECT * FROM $table_name WHERE imageId = '$imageId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        // $numOfLikes = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $numOfLikes += $row['likes'];
        }
      } catch (PDOException $e) {
          echo "Unable to get like " . $e->getMessage();
      }
      return $numOfLikes;
    }
?>
