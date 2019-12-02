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

  function putStickers($image1, $image2)
  {
    list($width, $height) = getimagesize($image2);

    $image1 = imagecreatefromstring(file_get_contents($image1));
    $image2 = imagecreatefromstring(file_get_contents($image2));

    imagecopymerge($image1, $image2, 0, 0, 0, 0, $width, $height, 100);
    header('Content-Type: image/png');
    imagepng($image1);
  }
  $id = "";
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $images = "images";
    $getImage = getStickerImage($images, $id);
    putStickers($getImage, "0.png");
    header('location: index.php');
  }
?>
