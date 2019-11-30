<?php
<<<<<<< HEAD
    function addComment($table_name, $imageId, $comment, $userId)
    {
      global $handle;
      try {
        $sql = "INSERT INTO $table_name (comments, imageId, userId) VALUES (:comments, :imageId, :userId)";
=======
    function addComment($table_name, $imageId, $comment, $userId, $username)
    {
      global $handle;
      try {
        $sql = "INSERT INTO $table_name (comments, imageId, userId, username) VALUES (:comments, :imageId, :userId, :username)";
>>>>>>> 6ac3a03b080845bb29254217180332c298cafb66
        $stmt = $handle->prepare($sql);
        $stmt->bindParam(':comments', $comment);
        $stmt->bindParam(':imageId', $imageId);
        $stmt->bindParam(':userId', $userId);
<<<<<<< HEAD
=======
        $stmt->bindParam(':username', $username);
>>>>>>> 6ac3a03b080845bb29254217180332c298cafb66
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

<<<<<<< HEAD
    
=======
>>>>>>> 6ac3a03b080845bb29254217180332c298cafb66
    function getComment($table_name, $imageId, $userId, $secTable)
    {
      global $handle;
      try {
        $sql = "SELECT * FROM $table_name WHERE imageId = '$imageId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        
<<<<<<< HEAD
        $theUser = getPostUser($secTable, $userId);
        // echo "<table><tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // echo "<td>";
            echo $theUser.": ".$row['comments'];
=======
        // $theUser = getPostUser($secTable, $userId);
        // echo "<table><tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // echo "<td>";
            echo $row['username'].": ".$row['comments'];
>>>>>>> 6ac3a03b080845bb29254217180332c298cafb66
            // echo "</td><br>";
             echo "<br>";
        }
        // echo "</tr></table>";
      } catch (PDOException $e) {
            echo "Unable to get comment " . $e->getMessage();
      }

    }
?>
