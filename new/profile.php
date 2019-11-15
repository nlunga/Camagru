<?php
  require_once 'controls.php';
  include 'proccessForm.php';
  $username = "";
  $picture = "";
  if (isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
    $picture = $_SESSION['username']."-pic";
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $username?></title>
    <style>
      input[type="file"] {
        display: none;
      }
    </style>
  </head>
  <body>
    <a href="index.php"><h1>Camagru</h1></a>
    <div class="prof">
      <form class="prof" action="profile.php" method="post" enctype="multipart/form-data">
      <div class="error_message">
        <?php
          if (count($error)>0) {
            echo "<ul>";
            foreach ($error as $erro) {
              echo "<li>" . $erro . "</li><br>";
            }
            echo "</ul>";
          }
        ?>
      </div>
        <label>
          <img id="profilePic" style="border-radius: 50%;" width="250" height="250" name="<?php echo $picture; ?>" src="resources/noavatar.png"  alt="unsplash"><br>
          <input type="file" name="profile-photo" onchange="handleFiles(this.files)">
        </label>
          <input type="submit" name="upload-prof" value="Upload">
      </form>
    </div>

    hi <?php echo $username;?>
    <script type="text/javascript">
      function handleFiles(files) {
        if (!files.length) {
          console.log("No files selected!");
        } else {
            for (let i = 0; i < files.length; i++) {
              console.log(files[i].name);
              var pic = document.getElementById("profilePic");
              pic.src = window.URL.createObjectURL(files[i]);
          }
        }
      }
    </script>
  </body>
</html>
