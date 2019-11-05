<?php
  session_start();
  include 'create.php';
  require_once 'emailController.php';

  $error = array();
  $username = "";
  $userEmail = "";

  function test_user_input ($data) {
    return $data;
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
    /* //uncomment
     $emailQuery = "SELECT * FROM new_users WHERE email=? LIMIT 1";
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

        header('Location: index.php');
        exit();
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
?>
