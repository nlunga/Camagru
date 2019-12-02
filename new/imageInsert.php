<?php
  require 'reconnect.php';

  function insertImage($newUserId, $imagePath)
  {
    global $handle;
    try {
      $sql = "INSERT INTO images(images, userId) VALUES (:images, :userId)";
      $stmt = $handle->prepare($sql);
      $stmt->bindParam(':images', $imagePath);
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

  /*function putStickers($image1, $image2)
  {
    list($width, $height) = getimagesize($image2);

    $image1 = imagecreatefromstring(file_get_contents($image1));
    $image2 = imagecreatefromstring(file_get_contents($image2));

    imagecopymerge($image1, $image2, 0, 0, 0, 0, $width, $height, 100);
    header('Content-Type: image/png');
    imagepng($image1);
  }*/

  function getImage($table_name, $userId)
  {
    global $handle;

    try {
        $sql = "SELECT * FROM $table_name WHERE userId='$userId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        echo "<table><tr>";
        // echo '<div class="gallery" style=" display : grid; grid-template-columns : 1fr 1fr 1fr; grid-gap: 1rem; width: 80vw; margin :3rem 3rem; grid-template-rows: auto;">';
        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<td>";

          //$temp = explode("_", $row['images']);
          //echo '<img  src="saveImages/'.$temp[1] . '" height="250" width="250" alt="fail">';
          // echo '<img  src="saveImages/'.$row['images'].'" height="250" width="250" alt="fail">';
          echo '<img  src="'.$row['images'].'" height="250" width="250" alt="fail">';
          echo "<br>";
          ?><a href="delete.php?id=<?php echo $row["id"]; ?>&path=<?php echo $row['images']; ?>">Delete</a>
          <input type="button" class="stick" name="sticker" value="Add Stickers" onclick="addSticker(<?php echo $i;?>)" >
            <div class="sticker-list" id="list<?php echo $i;?>" style="display: none;">
              <ul>
                <a href="stickers.php?id=<?php echo $row['id']; ?>"><img src="stickers/0.png" alt="no-control" width="30" height="30"></a>
                <a href="stickers.php?id=<?php echo $row['id']; ?>"><img src="stickers/1.png" alt="camera sticker" width="30" height="30"></a>
                <a href="stickers.php?id=<?php echo $row['id']; ?>"><img src="stickers/2.png" alt="space out" width="30" height="30"></a>
                <a href="stickers.php?id=<?php echo $row['id']; ?>"><img src="stickers/3.jpg" alt="baby groot" width="30" height="30"></a>
                <a href="stickers.php?id=<?php echo $row['id']; ?>"><img src="stickers/4.png" alt="no bad vibes" width="30" height="30"></a>
              </ul>
            </div>
          <script type="text/javascript">
            // var addSticker = document.getElementsByClassName('stick')[<?php echo $i;?>];
            var showSticker = document.getElementsByClassName('sticker-list')
            //[<?php //echo $i;?>];
            // var list = document.getElementById('list');
            //
            // addSticker.onclick = function (){
            //   if (/*list.style.display === "none"*/showSticker.style.display === "none") {
            //      showSticker.style.display = "block";
            //     // list.style.display = "block";
            //   }else {
            //     showSticker.style.display = "none";
            //     // list.style.display = "none";
            //   }
            // };
            function addSticker(id) {
              var list = document.getElementById('list'+ id);
              console.log("Im here");
              if (list.style.display === 'none') {
                list.style.display = 'block';
              }else {
                list.style.display = 'none';
              }
            }
          </script>
          <?php echo "</td><br>";
          $i++;
        }
        echo "</tr></table>";
        // echo "</div>";

    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }

  }

  function getImageCamera($table_name, $userId)
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
          echo '<img  src="saveImages/'.$row['images'] . '" height="250" width="250" alt="fail">';
          echo "<br>";
          ?><a href="delete.php?id=<?php echo $row["id"]; ?>&path=<?php echo $row['images']; ?>">Delete</a>
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
    $dest = "";

    try {
        $sql = "SELECT * FROM $table_name";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        echo "<table><tr>";
        // echo '<div class="gallery" style=" display : grid; grid-template-columns : 1fr 1fr 1fr; grid-gap: 1rem; width: 80vw; margin :3rem 3rem; grid-template-rows: auto;">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $dest = $row['id'];
          $user_id = $row['userId'];
          echo "<td>";
          $temp = explode("_", $row['images']);
          if (isset($_SESSION['id'])) {
            $link = '<a href="comments_likes.php?id='.$dest.'&userId='.$user_id.'">';
            echo $link.'<img src="' . $row['images'] . '" height="250" width="250" alt="fail"></a>';
          }else{
          echo '<img  src="'.$row['images'] . '" height="250" width="250" alt="fail">';
          }
          echo "<br>";
          echo "</td><br>";
        }
        echo "</tr></table>";
        // echo "</div>";
    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }

  }
?>
