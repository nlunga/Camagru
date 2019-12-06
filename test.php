<?php
    require_once 'reconnect.php';

    function sendliked($userMail, $subject, $message)
    {
        mail($userMail, $subject, $message);
    }

    function updateLikes($table_name, $userId, $imageId)
    {
      global $handle;
      try {
        $sql = "UPDATE likes SET likes=0 WHERE userId='$userId' AND imageId='$imageId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        // unset($_GET['clicked']);
      } catch (PDOException $e) {
        echo "Update query Failed ".$e->getMessage();
      }
    }

    function getUsername($table_name, $userId) {
        global $handle;
        $sql = "SELECT * FROM $table_name WHERE id='$userId' LIMIT 1";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['username'];
    }

    function getImage($table_name, $userId) {
        global $handle;
        $sql = "SELECT * FROM $table_name WHERE id='$userId' LIMIT 1";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['userId'];
    }

    function getMail($table_name, $userId) {
        global $handle;
        $sql = "SELECT * FROM $table_name WHERE id='$userId' LIMIT 1";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['email'];
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

    function checkNumLikes($table_name,$likes, $imageId, $userId)
    {
      global $handle;
      try {
        $sql = "SELECT * FROM $table_name WHERE userId='$userId' AND imageId='$imageId' LIMIT 1";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row_count = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($row_count['id'])) {
            updateLikes($table_name, $userId, $imageId);
        }else {
          addLike($table_name, $likes, $imageId, $userId);
          $liker = getUsername('new_users', $row_count['userId']);
          $liked = getImage('images', $row_count['imagesId']);
          $sender = getMail('new_users', $liked);
          sendliked($sender, "You got a new like. ", "$liker Likes yopur image ");
        }
      } catch (PDOException $e) {
        echo "Failed to access the Database ".$e->getMessage();
      }
    }

    checkNumLikes('likes', 1, 103, 1);
?>