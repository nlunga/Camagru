<?php require_once 'controls.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
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
    <div class="header">
      <a href="index.php"><h1>Camagru</h1></a>
      <a class="tab" href="camera_view.php?logout=1">Log out</a>
    </div>
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
    <script src="../js/snap.js" type="module"></script>
    <div class="footer">
      <p>@nlunga 2019</p>
    </div>
  </body>
</html>
