<?php
 require_once 'controls.php';
 include_once 'proccessForm.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, intial-scale=1, shrink-to-fit=no">
    <title></title>
  </head>
  <body>
    <!-- <form action=""> -->
      <div class="video-wrap">
        <div class="">
          <video id="video" style="display:inline-block; vertical-align: top;" playsinline autoplay></video>

          <img id="output" src="" name="images" style="display:inline-block; vertical-align: top;" alt="">

        </div>
      </div>
      <div class="snap">
        <input type="submit" id="take" name="snap-btn" value="Capture">
        <!-- <form class="" action="ft_snapchat.php" method="post"  onsubmit="upload_img();"> -->
          <!-- <input type="hidden"  id="img_sub" name="images" value=""> -->
          <input type="button" id="upload" name="post" value="Upload">
        <!-- </form> -->
      </div>
    <!-- </form> -->
    <div id="demo"></div>
    <canvas id="canvas" name="images" hidden></canvas>
    <script src="../js/snap.js" type="module"></script>
  </body>
</html>
