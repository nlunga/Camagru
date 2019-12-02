<?php
/*
  function putStickers($image1, $image2)
  {
    list($width, $height) = getimagesize($image2);

    $image1 = imagecreatefromstring(file_get_contents($image1));
    $image2 = imagecreatefromstring(file_get_contents($image2));

    imagecopymerge($image1, $image2, 0, 0, 0, 0, $width, $height, 100);
    header('Content-Type: image/png');
    imagepng($image1);
  }
  */
    $image1 = '';
    $image2 = '';
    list($width, $height) = getimagesize($image2);

    $image1 = imagecreatefromstring(file_get_contents($image1));
    $image2 = imagecreatefromstring(file_get_contents($image2));

    imagecopymerge($image1, $image2, 0, 0, 0, 0, $width, $height, 100);
    header('Content-Type: image/png');
    imagepng($image1);
?>
