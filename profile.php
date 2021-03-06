<?php
  require_once 'controls.php';
  include 'proccessForm.php';
  $username = "";
  $picture = "";
  // if (isset($_SESSION['id'])) {
  //   $user_id = $_SESSION['id'];
  //   $username = $_SESSION['username'];
  //   require_once 'reconnect.php';
  //   $sql = "SELECT * FROM profile WHERE userId='$user_id' LIMIT 1";
  //   $result = $handle->prepare($sql);
  //   $result->execute();
  //   $row_count = $result->fetchColumn();
  //   if ($row_count > 0) {
  //     $user = $result->fetch(PDO::FETCH_ASSOC);
  //     $_SESSION['profile_pic'] = $user['profile_pic'];
  //     $picture = $_SESSION['profile_pic'];
  //     $_SESSION['id'] = $user['id'];
  //   }
  // }else {
  //   // header('location: index.php');
  // }

    if (!isset($_SESSION['id'])) {
      header('location: index.php');
    }else {
      $user_id = $_SESSION['id'];
      $username = $_SESSION['username'];
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

      .gallery {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 1rem;
        width: 80vw;
        margin: 3rem 3rem;
        grid-template-rows: auto;
      }

      .gallery img{
        /* width: 100%; */
        height: auto;
        /* max-width: 100%; */
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
      <a class="tab" href="profile.php?logout=1">Log out</a>
    </div>
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
        <form action="profile.php" method="post" enctype="multipart/form-data">
          <label for="test">Choose Image</label>
          <input type="file" id="test" name="images">
          <input type="submit" name="imageUpload" value="Upload Image">
          <a href="ft_snapchat.php"><img src="resources/take2.jpg" alt=""></a>
          <a href="edit.php">Edit info</a>
        </form>
        <hr>
        <div class="gallery">
          <?php
            require_once 'imageInsert.php';
            getImage("images", $_SESSION['id']);
          ?>

        </div>
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
    <div class="footer">
      <p>@nlunga 2019</p>
    </div>
  </body>
</html>
