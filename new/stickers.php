<?php
  require_once 'imageInsert.php';

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

    imagecopymerge($image1, $image2, 0, 0, 0, 0, $width, $height, 100);
    // header('Content-Type: image/png');

    $newImage = "3".getStickerImage("images", $imageId);
    ini_set('memory_limit', '-1');
    imagepng($image1, $newImage);
    $newsql = "UPDATE :table SET images=:images WHERE id=:id";
        // $newsql = "UPDATE images SET images='hello' WHERE id=20";
    $stmt = $handle->prepare($newsql);
    $stmt->execute([":table"=>$table_name, ":images"=>$newImage, ":id"=>$imageId]);
      // $stmt->execute();
      // header('location: profile.php');

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
