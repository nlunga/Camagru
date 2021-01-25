<?php
    // session_start();
    require_once '../Model/create_new_user.php';
    //define variables and set to empty values
    $username = $user_email = $passwd = $confPasswd = "";
    $error = array();
    $handle = connection();

    // Register form data
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        
        $confPasswd = clean_input($_POST["confPasswd"]);
        
        if (empty($_POST["username"])) {
            $error['UserNameError'] = "Please enter a username";
        }else {
            $username = clean_input($_POST["username"]);
        }

        if (!filter_var($_POST["user-email"], FILTER_VALIDATE_EMAIL)) {
            $error['EmailError'] = "Email address is invalid";
        }

        if (empty($_POST["user-email"])) {
            $error['EmailError'] = "Please enter an email address";
        }else {
            $user_email = clean_input($_POST["user-email"]);
        }

        if (empty($_POST["passwd"])) {
            $error['PasswordError'] = "Please enter a password";
        }else {
            if (!preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', clean_input($_POST["passwd"]))){
                $error['PasswordError'] = "Password is not strong enough, you password must have atleat one uppercase(A-Z) one lowercase(a-z), a number(0-9), and it must have a minimum of 8 characters";
            }else{
                $passwd = clean_input($_POST["passwd"]);
            }
        }
        if ($confPasswd !== clean_input($_POST["passwd"])) {
            $error['ConfPasswordError'] = "Password does no match";
        }
        if (count($error) === 0) {
            create_new_user($handle, $username, $user_email, $passwd);
        //header('Location: index.php');
            // echo $username . '<br>' . $user_email . '<br>' . $passwd . '<br>' . $confPasswd;
        }
    }

    // Login form data

    if (isset($_POST['login-btn']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $username = clean_input($_POST['username-email']);
        $passwd = clean_input($_POST['log-passwd']);
        // echo $username . ' in<br>And your password is: ' . $passwd;

        if (empty($username)) {
            $error['UserNameError'] = "Please enter a username";
          }
          if (empty($passwd)) {
            $error['PasswordError'] = "Please enter a password";
          }
          if (count($error) === 0) {
              echo $username;
            $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
            $stmt = $handle->prepare($sql);
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($passwd, $result['password'])) {
              $_SESSION['id'] = $result['id'];
              $_SESSION['username'] = $result['username'];
              $_SESSION['email'] = $result['email'];
              $_SESSION['verified'] = $result['verified'];
      
              $_SESSION['message'] = "You are now logged in";
              unset($_SESSION['message']);
              if ($_SESSION['verified'] == 0) {
                header('Location: verify_message.php');
                exit();
              }else {
                header('Location: index.php');
                exit();
              }
            }else {
              $error['login_fail'] = "Wrong info";
            }
        }
    }

    if (isset($_POST['profileSubmit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        // Posted Values
        $imgtitle=$_POST['profile-image'];
        $imgfile=$_FILES["image"]["name"];
        // get the image extension
        $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension,$allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile=md5($imgfile).$extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["image"]["tmp_name"],"uploadeddata/".$imgnewfile);
            // Query for insertion data into database
            $query=mysqli_query($con,"insert into tblimages(ImagesTitle,Image) values('$imgtitle','$imgnewfile')");
            if ($query) {
                echo "<script>alert('Data inserted successfully');</script>";
            } else {
                echo "<script>alert('Data not inserted');</script>";
            }
        }

    }
?>