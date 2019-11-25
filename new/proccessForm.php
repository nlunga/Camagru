<?php
  // session_start();
  require_once 'imageInsert.php';
  $error = array();

  if (isset($_POST["upload-prof"])) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["profile-photo"]["tmp_name"]);
    $filename = time()."_".$_FILES["profile-photo"]["name"];
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
      $error["imageError"] = "Upload valid images. Only PNG and JPEG are allowed.";
      echo $result;
    }    // Validate image file size
    else if (($_FILES["profile-photo"]["size"] > 5000000)) {
      $error["imageError"] = "Image size exceeds 2MB";
    }    // Validate image file dimension
    /*else if ($width > "300" || $height > "200") {
      $error["imageError"] = "Image dimension should be within 300X200";
    }*/ else {
      $target = "profile_pics/" . basename($_FILES["profile-photo"]["name"]);
      $img_dir = "profile_pics/" . $_FILES["profile-photo"]["name"];
        if (move_uploaded_file($_FILES["profile-photo"]["tmp_name"], $img_dir)) {// you can replace $img_dir with $target
            //insertProfileImage($_SESSION['id'], $filename);
            $response["imageSuccess"] = "Image uploaded successfully.";
        } else {
            $error["imageError"] = "Problem in uploading image files.";
        }
    }

    if (count($error) === 0) {
      // require 'imageInsert.php';
      insertProfileImage($_SESSION['id'], $filename);
    }
  }


  $errorn = array();


  if (isset($_POST['imageUpload']) || isset($_POST['post'])) {
    // print_r($_POST);
    if (isset($_POST['imageUpload'])) {
      $fileinfo = @getimagesize($_FILES["images"]["tmp_name"]);
      print_r($filename = time()."_".$_FILES["images"]["name"]);
      $allowed_image_extension = array("png", "jpg", "jpeg");

      $file_extension = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);
      if (! file_exists($_FILES["images"]["tmp_name"])) {
        $errorn["imageError"] = "Choose image file to upload.";
      }else if (! in_array($file_extension, $allowed_image_extension)) {
        $errorn["imageError"] = "Upload valid images. Only PNG and JPEG are allowed.";
      }else {
        $img_dir = "saveImages/" . $_FILES["images"]["name"];
        if (move_uploaded_file($_FILES["images"]["tmp_name"], $img_dir)) {
          $response["imageSuccess"] = "Image uploaded successfully.<br>";
        }else {
            $errorn["imageError"] = "Problem in uploading image files.";
        }
      }

    }else if (isset($_POST['post'])){
      // print_r($_POST['images']);
      // $fileinfo = @getimagesize($_POST["images"]);
      print_r($_FILES);
      echo '<br /><br />';

        $filename      = uniqid();
      	$target_file   = "./saveImages/".$filename;
      	// $temp          = '../images/tmp/'.$filename;
      	$file          = $_FILES["file"];
      	$imageFileType = strtolower(pathinfo($file["tmp_name"], PATHINFO_EXTENSION));
      	$allowed       = array('jpg', 'jpeg', 'gif', 'png', 'tif');
      	$target_file  .= '.'.explode('/', $file['type'])[1];
      	// $temp		  .= '.'.explode('/', $file['type'])[1];
      	$filename	  .= '.'.explode('/', $file['type'])[1];
      	// $temp
      	// header('Content-type: ' . $file['type']);
      	// echo "File is of type --> ".$target_file."\n";
      	// echo "File contents -->".$file['name'];
      	//ft_makedir('./saveImages');
      	// ft_makedir('../images/tmp/');
      	// ft_print_r($content);
      	file_put_contents($target_file, file_get_contents($file['tmp_name']));
      	move_uploaded_file($file['tmp_name'], $target_file);

      /*$rename = $_POST["images"];
      $tmp = explode("base64,", $rename);
      $mem = base64_decode($tmp[1]);

      $image = imagecreatefromstring($mem);
      $filename = uniqid();
      $target = "./saveImages/".$filename.".png";
      file_put_contents($target, $image);
      print_r($filename = time()."_".$image);
      $allowed_image_extension = array("png", "jpg", "jpeg");

      $file_extension = pathinfo($_POST["images"], PATHINFO_EXTENSION);
      /*if (! file_exists($_FILES["images"]["tmp_name"])) {
        $errorn["imageError"] = "Choose image file to upload.";
      }else */

    /*  if (! in_array($file_extension, $allowed_image_extension)) {
        $errorn["imageError"] = "Upload valid images. Only PNG and JPEG are allowed.";
      }else {
        $img_dir = "saveImages/" . $_POST["images"];
        echo $img_dir;
        if (move_uploaded_file($_POST["images"], $img_dir)) {
          // $response["imageSuccess"] = "Image uploaded successfully.<br>";
        }// }else {
        //     $errorn["imageError"] = "Problem in uploading image files.";
        // }
      }*/

    }
    // $fileinfo = @getimagesize($_FILES["images"]["tmp_name"]);
    // $filename = time()."_".$_FILES["images"]["name"];
    // $allowed_image_extension = array("png", "jpg", "jpeg");
    //
    // $file_extension = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);
    // if (! file_exists($_FILES["images"]["tmp_name"])) {
    //   $errorn["imageError"] = "Choose image file to upload.";
    // }else if (! in_array($file_extension, $allowed_image_extension)) {
    //   $errorn["imageError"] = "Upload valid images. Only PNG and JPEG are allowed.";
    // }else {
    //   $img_dir = "saveImages/" . $_FILES["images"]["name"];
    //   if (move_uploaded_file($_FILES["images"]["tmp_name"], $img_dir)) {
    //     $response["imageSuccess"] = "Image uploaded successfully.<br>";
    //   }else {
    //       $errorn["imageError"] = "Problem in uploading image files.";
    //   }
    // }

    if (count($errorn) === 0) {
      insertImage($_SESSION['id'], $filename);

    }

  }
?>
$filename = uniqid();
$target = "./saveImages/".$filename;
file_put_contents($target, file_get_contents($_POST["images"]));
