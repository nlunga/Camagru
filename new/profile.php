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
    <a href="index.php"><h1>Camagru</h1></a>
    <div class="prof">
      <label>
        <img id="profilePic" style="border-radius: 50%;" width="250" height="250" name="<?php echo $picture; ?>" src="resources/noavatar.png"  alt="unsplash"><br>
        <input type="file" name="profile-photo" onchange="handleFiles(this.files)">
      </label>
    </div>

    hi <?php echo $username;?>
    <script type="text/javascript">
      var temp = document.getElementById('profilePic');
      function getImage() {
        var test = document.createElement("INPUT");
        test.setAttribute("type", "file");
      }

      function handleFiles(files) {
        // console.log('Hello world');
        if (!files.length) {
          console.log("No files selected!");
        } else {
          // fileList.innerHTML = "";
          // const list = document.createElement("ul");
          // fileList.appendChild(list);
          for (let i = 0; i < files.length; i++) {
            // const li = document.createElement("li");
            // list.appendChild(li);

            console.log(files[i].name);
            // const img = document.createElement("img");
            var pic = document.getElementById("profilePic");
            pic.src = window.URL.createObjectURL(files[i]);
            // img.height = 60;
            // img.onload = function() {
            //   window.URL.revokeObjectURL(this.src);
            // }
            // li.appendChild(img);
            // const info = document.createElement("span");
            // info.innerHTML = files[i].name + ": " + files[i].size + " bytes";
            // li.appendChild(info);
          }
        }
      }
    </script>
  </body>
</html>
