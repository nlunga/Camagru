<?php
  require_once 'controls.php';
  include 'proccessForm.php';
  $username = "";
  $picture = "";
  if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $username = $_SESSION['username'];
    require_once 'reconnect.php';
    $sql = "SELECT * FROM profile WHERE userId='$user_id' LIMIT 1";
    $result = $handle->prepare($sql);
    $result->execute();
    $row_count = $result->fetchColumn();
    if ($row_count > 0) {
      $user = $result->fetch(PDO::FETCH_ASSOC);
      $_SESSION['profile_pic'] = $user['profile_pic'];
      $picture = $_SESSION['profile_pic'];
      $_SESSION['id'] = $user['id'];
    }
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

      #test{
       /* display: unset; */
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
    <hr>
    <div class="wrapper">
      <div class="userNav">
        <?php
          require 'delete.php';
          //delete_data("images", $handle, $_SESSION['id']);
        ?>
        <form action="profile.php" method="post" enctype="multipart/form-data">
          <label for="test">Choose Image</label>
            <input type="file" id="test" name="images">

            <!-- <input type="file" id="test" name="Choose Image"> -->


          <input type="submit" name="imageUpload" value="Upload Image">
        </form>
      </div>
    </div>
    <script type="text/javascript">
      function handleFiles(files) {
        if (!files.length) {
          // console.log("No files selected!");
        } else {
            for (let i = 0; i < files.length; i++) {
              // console.log(files[i].name);
              var pic = document.getElementById("profilePic");
              pic.src = window.URL.createObjectURL(files[i]);
          }
        }
      }
    </script>
  </body>
</html>
