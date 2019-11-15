<?php
  session_start();
  include 'create.php';

  $error = array();
  $username = "";
  $userEmail = "";

  function test_user_input ($data) {
    return $data;
  }

/*function duplicateValidation($data, $table_name, $check, $checkValue){
    global $handle;
    try {
/*      $sql = "SELECT * FROM $table_name WHERE $check=? LIMIT 1";
      $stmt = $handle->prepare($sql);
      $stmt->bindParam($checkValue, $data);
      $stmt->execute();
      $row_count = $stmt->fetchColumn();
      if ($row_count > 0) {
        $error['duplicateError'] = "$check already exists in the database";
      }
    } catch (PDOException $e) {
      //die("Unable to access the database... ").$e->getMessage();
        echo "Unable to access the database... ".$e->getMessage();
    }*/
    /*$sql = "SELECT email FROM new_users";
    $result_set = $handle->query($sql);
    $array = $result_set->fetchall();
    var_dump($array);
  }*/

  function sendPasswordResetLink($userMail, $token)
  {
    mail($userMail, "Reset your Password", "Reset Password: http://localhost:8080/Camagru/new/index.php?password-token=$token");

  }

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $userEmail = $_POST['user-email'];
    $password = $_POST['passwd'];
    $confPass = $_POST['confPasswd'];

    if (empty($username)) {
      $error['UserNameError'] = "Please enter a username";
    }else {
      $username = test_user_input($username);
    }
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
      $error['EmailError'] = "Email address is invalid";
    }
    if (empty($userEmail)) {
      $error['EmailError'] = "Please enter an email address";
    }else {
      $userEmail = test_user_input($userEmail);
    }
    if (empty($password)) {
      $error['PasswordError'] = "Please enter a password";
    }else {
      $password = test_user_input($password);
    }
    if ($confPass !== $password) {
      $error['ConfPasswordError'] = "Password does no match";
    }
     //uncomment
  /*   $emailQuery = "SELECT * FROM new_users WHERE email=? LIMIT 1";
    // $usernameQuery = "SELECT * FROM new_users WHERE username=? LIMIT 1";
     $emailstmt = $handle->prepare($emailQuery);
    // $usernamestmt = $handle->prepare($usernameQuery);
     $emailstmt->bindParam(':email', $userEmail);
    // //$emailstmt->bind_param('s', $userEmail);
    // $usernamestmt->bindParam(':username', $username);
     $emailstmt->execute([$userEmail]);
    // $usernamestmt->execute([$username]);
     $emailResult = $emailstmt->fetch();
    // $usernameResult= $usernamestmt->fetch();
     $emailCount = $emailResult->rowCount();
    // $usernameCount = $usernameResult->rowCount();
    //
     if ($emailCount > 0) {
       $error['EmailError'] = "Email already exists";
     }*/ // uncomment
    // if ($usernameCount > 0) {
    //   $error['UserNameError'] = "Username already exists";
    // }
    //duplicateValidation($userEmail, "new_users", "email", ":email");
    if (count($error) === 0) {

      insert2table($handle, $username, $userEmail, $password);
      //header('Location: index.php');
    }

  }

  // when user logs in.
  $username_email = "";
  if (isset($_POST['login-btn'])) {
    $username_email = $_POST['username-email'];
    $passlog = $_POST['log-passwd'];
    if (empty($username_email)) {
      $error['UserNameError'] = "Please enter a username";
    }
    if (empty($passlog)) {
      $error['PasswordError'] = "Please enter a password";
    }
    if (count($error) === 0) {
      $sql = "SELECT * FROM new_users WHERE email=? OR username=? LIMIT 1";
      $stmt = $handle->prepare($sql);
      $stmt->bindParam(1, $username_email);
      $stmt->bindParam(2, $username_email);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if (password_verify($passlog, $result['password'])) {
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

  // log user out
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);

    header('location: login.php');
    exit();
  }

  // verify user by $token
  function verifyUser($token)
  {
    global $handle;
    $sql = "SELECT * FROM new_users WHERE token='$token' LIMIT 1";
    $result = $handle->prepare($sql);
    $result->execute();
    $row_count = $result->fetchColumn();
    if ($row_count > 0) {
      $user = $result->fetch(PDO::FETCH_ASSOC);
      $update_query = "UPDATE new_users SET verified=1 WHERE token='$token'";
      if ($handle->exec($update_query)) {
        // log user in
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = 1;
        //set flash message
        $_SESSION['message'] = "Your email address was successfullyverified";
        unset($_SESSION['message']);

        header('Location: index.php');
        // header('Location: index.php');
        exit();
      }
    }else {
      echo "User not found";
    }

  }

  //forgot password
  $email = "";
  if (isset($_POST['recover-btn'])) {
    $email = $_POST['recover-email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error['EmailError'] = "Email address is invalid";
    }
    if (empty($email)) {
      $error['EmailError'] = "Please enter an email address";
    }

    if (count($error) == 0) {
      $sql = "SELECT * FROM new_users WHERE email='$email' LIMIT 1";
      $result = $handle->prepare($sql);
      $result->execute();
      $user = $result->fetch(PDO::FETCH_ASSOC);
      $token = $user['token'];
      sendPasswordResetLink($email, $token);
      header('location: password_message.php');
      exit();
    }
  }

  if (isset($_POST['resetPassword-btn'])) {
    $password = $_POST['passwd'];
    $passwordConf = $_POST['con-passwd'];

    if (empty($password) || empty($passwordConf)) {
      $error['PasswordError'] = "Please enter a password";
    }
    if ($passwordConf !== $password) {
      $error['ConfPasswordError'] = "Password does no match";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if (count($error) == 0) {
      $update_query = "UPDATE new_users SET password='$password' WHERE email='$email'";
      $result = $handle->prepare($update_query);
      $result->execute();
      if ($result) {
        header('location: login.php');
        exit();
      }
    }
  }

  function resetPassword($token)
  {
    global $handle;
    $sql = "SELECT * FROM new_users WHERE token='$token' LIMIT 1";
    $result = $handle->prepare($sql);
    $result->execute();
    $user = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['email'] = $user['email'];
    header('location: reset_password.php');
    exit();
  }
?>
