<?php
  require_once 'controls.php';
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
    <div class="prof">
      <label>
        <img id="profilePic" style="border-radius: 50%;" width="250" height="250" name="<?php echo $picture; ?>" src="resources/noavatar.png"  alt="unsplash"><br>
        <input type="file" name="profile-photo" onchange="handleFiles(this.files)">
      </label>
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
