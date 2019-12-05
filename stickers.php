<?php
  require_once 'imageInsert.php';
  require_once 'reconnect.php';

  function getStickerImage($table_name, $imageId)
  {
    global $handle;

    try {
        $sql = "SELECT * FROM $table_name WHERE id='$imageId'";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $img = $row['images'];
    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }
    return $img;
  }

  function putStickers($table_name, $image1, $image2, $imageId){
    global $handle;

    list($width, $height) = getimagesize($image2);

    $image1 = imagecreatefromstring(file_get_contents($image1));
    $image2 = imagecreatefromstring(file_get_contents($image2));

    imagecopymerge($image1, $image2, 450, 0, 0, 0, $width, $height, 100);
    // header('Content-Type: image/png');
    $check_img = getStickerImage("images", $imageId);
    if (preg_match('/saveImages/', $check_img)) {
      $newImage = explode("saveImages/", $check_img);
      $img =  "3".$newImage[1];
      ini_set('memory_limit', '-1');
      imagepng($image1, $img);
    }else {
      $img = "3".$image1;
      ini_set('memory_limit', '256M');
      imagepng($image1, "3".$image1);
    }

   // $newsql = "UPDATE :table SET images=:images WHERE id=:id";
        $newsql = "UPDATE images SET images='$img' WHERE id='$imageId'";
   $stmt = $handle->prepare($newsql);
   // $stmt->execute([":table"=>$table_name, ":images"=>$newImage, ":id"=>$imageId]);
      $stmt->execute();
      header('location: profile.php');

  }
  $id = "";
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $images = "images";
    $image3 = $_GET['stick'];
    $getImage = getStickerImage($images, $id);
    putStickers("images", $getImage, $image3, $id);
    // header('location: profile.php');
  }
?>
