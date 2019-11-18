<?php require_once 'controls.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="">
      <div class="video-wrap">
        <video id="video" playsinline autoplay></video>
      </div>
      <div class="snap">
        <input type="submit" name="snap-btn" value="Capture">
      </div>
    </form>
    <div id="demo"></div>
    <canvas id="canvas" width="640" height="480"></canvas>
    <script src="./js/snap.js"></script>
  </body>
</html>
