<?php require_once 'controls.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Password Message</title>
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
    </div>
    <div class="recovery_mess">
      <p>An email has been sent to your email address to with a link to reset your password.</p>
    </div>
    <div class="footer">
      <p>@nlunga 2019</p>
    </div>
  </body>
</html>
