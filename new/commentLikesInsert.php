<?php
    function addComment($table_name, $imageId, $comment)
    {
      global $handle;
      try {
        $sql = "INSERT INTO $table_name (comments, imageId) VALUES (:comments, :imageId)";
        $stmt = $handle->prepare($sql);
        $stmt->bindParam(':comments', $comment);
        $stmt->bindParam(':imageId', $imageId);
        $stmt->execute();
      } catch (PDOException $e) {
            echo "Unable to insert data ".$e->getMessage();
      }

    }

    function getComment($table_name, $imageId)
    {
      global $handle;
      try {
        $sql = "SELECT * FROM $table_name WHERE imageId = '$imageId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();

        // echo "<table><tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // echo "<td>";
            echo $_SESSION['username'].": ".$row['comments'];
            // echo "</td><br>";
             echo "<br>";
        }
        // echo "</tr></table>";
      } catch (PDOException $e) {
            echo "Unable to get comment " . $e->getMessage();
      }

    }
?>
