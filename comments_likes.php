<?php
  require_once 'reconnect.php';
  require_once 'controls.php';
  echo '<div class="header"><a href="index.php"><h1>Camagru</h1></a></div>';
  
  function getUsername($table_name, $userId) {
    global $handle;
    $sql = "SELECT * FROM $table_name WHERE id='$userId' LIMIT 1";
    $stmt = $handle->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['username'];
  }

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
    $comment = test_user_input($_POST['comment']);
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

      .new{
        border: 1px solid green;
        padding: 3px;
        text-decoration: none;
        color: black;
        border-radius: 4px;
      }

      .new:visited{
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
      
      a {
        text-decoration: none;
      }

      body{
        margin: 0;
      }

      .header {
        background-color: #eafbea;
        width: 100%;
        height: 75px;
        border: 1px solid black;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <!-- <form action="comments_likes.php?id=<?php echo $_GET['id']; ?>&userId=<?php echo $_SESSION['id']?>&clicked=1" method="get">
      <input type="submit" value="like">
    </form><br> -->
    <div class="like">
      <?php if(getLikes('likes', $_GET['id'], 0) > 0):?>
      <a class="new" href="comments_likes.php?id=<?php echo $_GET['id']; ?>&userId=<?php echo $_SESSION['id']?>&clicked=1"><?php echo getLikes('likes', $_GET['id'], 0)/*$numOfLikes*/." "; ?>like</a>
      <?php endif;?>
      <?php if(getLikes('likes', $_GET['id'], 0) == 0):?>
        <a class="new" href="comments_likes.php?id=<?php echo $_GET['id']; ?>&userId=<?php echo $_SESSION['id']?>&clicked=1">like</a>
      <?php endif;?>
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
    <div class="footer">
      <p>@nlunga 2019</p>
    </div>
    <script src="js/script.js"></script>
  </body>
</html>
