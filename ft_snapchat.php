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
    <style>
      a {
        text-decoration: none;
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
      
      body{
        margin: 0;
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
      <a class="tab" href="ft_snapchat.php?logout=1">Log out</a>
    </div>
    <!-- <form action=""> -->
      <div class="video-wrap">
        <div class="">
          <video id="video" style="display:inline-block; vertical-align: top;" playsinline autoplay></video>

          <img id="output" src="" name="images" style="display:inline-block; vertical-align: top;" alt="">

        </div>
      </div>
      <div class="snap">
        <input type="submit" id="take" name="snap-btn" value="Capture">
        <!--<form class="" action="ft_snapchat.php" method="post"  onsubmit="upload_img();">--><!--- this is to be commented out -->
          <!--<input type="hidden"  id="img_sub" name="images" value="">--><!--- this is to be commented out -->
          <input type="button" id="upload" name="post" value="Upload">
          <a href="profile.php">back</a>
      <!--  </form> --><!--- this is to be commented out -->
      </div>
    <!-- </form> -->
    <div id="demo"></div>
    <canvas id="canvas" name="images" hidden></canvas>
    <script src="js/snap.js" type="module"></script>
    <div class="footer">
      <p>@nlunga 2019</p>
    </div>
  </body>
</html>
