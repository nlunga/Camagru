<?php
  require_once 'reconnect.php';
  require_once 'controls.php';
  function getImageInfo($table_name, $getId)
  {
    global $handle;
    try {
      $sql = "SELECT * FROM $table_name WHERE id='$getId' LIMIT 1";
      $stmt = $handle->prepare($sql);
      $stmt->execute();

      echo "<table><tr>";
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<td>";
        $temp = explode("_", $row['images']);
        echo '<img src="saveImages/' . $temp[1] . '" height="250" width="250" alt="fail">';
        echo "<br>";
        echo "</td><br>";
      }
      echo "</tr></table>";

    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }

  }
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    getImageInfo("images", $id);
  }
  $comment = "";
  if (isset($_POST['comment-btn'])) {
    $comment = $_POST['comment'];
    require_once 'commentLikesInsert.php';
    addComment("comments", $id, $comment);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="comments_likes.php?id=<?php echo $_GET['id']; ?>" method="post">
      <textarea name="comment" rows="8" cols="80"></textarea><br>
      <input type="submit" name="comment-btn" value="post">
    </form>
    <hr>
    <div class="comments">
      <?php
        require_once 'commentLikesInsert.php';
        getComment("comments", $id);
      ?>
    </div>
  </body>
</html>
