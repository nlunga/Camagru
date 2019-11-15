<?php
  // if (isset($_POST['upload-prof'])) {
  //   echo "<pre>" , print_r($_POST) , "</pre>";
  //   echo "<pre>" , print_r($_FILES) , "</pre>";
  //   echo "<pre>" , print_r($_FILES['profile-photo']) , "</pre>";
  // }

  $error = array();

  if (isset($_POST["upload-prof"])) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["profile-photo"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["profile-photo"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["profile-photo"]["tmp_name"])) {
      $error["imageError"] = "Choose image file to upload.";
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
      $error["imageError"] = "Upload valiid images. Only PNG and JPEG are allowed.";
      echo $result;
    }    // Validate image file size
    else if (($_FILES["profile-photo"]["size"] > 2000000)) {
      $error["imageError"] = "Image size exceeds 2MB";
    }    // Validate image file dimension
    else if ($width > "300" || $height > "200") {
      $error["imageError"] = "Image dimension should be within 300X200";
    } else {
        $target = "image/" . basename($_FILES["profile-photo"]["name"]);
        if (move_uploaded_file($_FILES["profile-photo"]["tmp_name"], $target)) {
            $response["imageSuccess"] = "Image uploaded successfully.";
        } else {
            $error["imageError"] = "Problem in uploading image files.";
        }
    }
}
?>
