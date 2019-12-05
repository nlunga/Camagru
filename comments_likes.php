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
        echo '<img src="' . $row['images'] . '" height="250" width="250" alt="fail">';
        echo "<br>";
        echo "</td><br>";
      }
      echo "</tr></table>";

    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }
  }

  $userId = "";
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userId = $_GET['userId'];
    getImageInfo("images", $id);
  }
  $comment = "";
  if (isset($_POST['comment-btn'])) {
    $comment = $_POST['comment'];
    require_once 'commentLikesInsert.php';
    $user = getPostUser("new_users", $_GET['userId']);
    addComment("comments", $id, $comment, $_GET['userId'], $user);
  }
  $numOfLikes = "";
  if (isset($_GET['clicked'])) {
    $num = 0;
    require_once 'commentLikesInsert.php';
    checkNumLikes('likes', $_GET['clicked'], $_GET['id'], $_GET['userId']);
    $numOfLikes = getLikes('likes', $_GET['id'], $num);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      #dat{
        /* border: none; */
        /* border-bottom: 1px solid red; */
        margin-top: 2px;
      }

      a{
        border: 1px solid green;
        padding: 3px;
        text-decoration: none;
        color: black;
        border-radius: 4px;
      }

      a:visited{
        border: 1px solid green;
        color: black;
        background-color: green;
      }
      
      .like {
        padding-top: 5px;
        padding-bottom: 5px;
      }

      .form {
        /* display: none; */
      }
    </style>
  </head>
  <body>
    <!-- <form action="comments_likes.php?id=<?php echo $_GET['id']; ?>&userId=<?php echo $_SESSION['id']?>&clicked=1" method="get">
      <input type="submit" value="like">
    </form><br> -->
    <div class="like">
      <a href="comments_likes.php?id=<?php echo $_GET['id']; ?>&userId=<?php echo $_SESSION['id']?>&clicked=1"><?php echo $numOfLikes." "; ?>like</a>
      <input type="button" id="comment-btn" value="add comment"><br>
    </div>
    <form id="form" style="display: none;" action="comments_likes.php?id=<?php echo $_GET['id']; ?>&userId=<?php echo $_SESSION['id']?>" method="post">
      <!-- <a href="comments_likes.php?clicked=1">like</a><br> commentLikesInsert.php?clicked=1-->
      <textarea id="dat" name="comment" rows="2" cols="50" placeholder="any thoughts"></textarea><br>
      <input type="submit" name="comment-btn" value="post">
    </form>
    <hr>
    <div class="comments">
      <?php
        require_once 'commentLikesInsert.php';
        getComment("comments", $id, $_SESSION['id'], "new_users");
      ?>
    </div>
<script src="../js/script.js"></script>
  </body>
</html>