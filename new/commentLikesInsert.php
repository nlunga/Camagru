<?php
    function addComment($table_name, $imageId, $comment, $userId)
    {
      global $handle;
      try {
        $sql = "INSERT INTO $table_name (comments, imageId, userId) VALUES (:comments, :imageId, :userId)";
        $stmt = $handle->prepare($sql);
        $stmt->bindParam(':comments', $comment);
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
        
        $theUser = getPostUser($secTable, $userId);
        // echo "<table><tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // echo "<td>";
            echo $theUser.": ".$row['comments'];
            // echo "</td><br>";
             echo "<br>";
        }
        // echo "</tr></table>";
      } catch (PDOException $e) {
            echo "Unable to get comment " . $e->getMessage();
      }

    }
?>
