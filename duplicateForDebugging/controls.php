<?php
  session_start();
  require 'connect.php';

  $UserNameError = "";
  $EmailError = "";
  $PasswordError = "";
  $ConfPasswordError = "";

  $error = array();

  $username = $_POST['username'];
  $userEmail = $_POST['user-email'];
  $password = $_POST['passwd'];
  $confPass = $_POST['confPasswd'];

  function test_user_input ($data) {
    return $data;
  }
/*$_SERVER['REQUEST_METHOD']) === 'POST'*/
  if (isset($_POST['submit'])) {
    if (empty($username)) {
      //$UserNameError = "Please enter username";
      $error['UserNameError'] = "Please enter a username";
    }else {
      $username = test_user_input($username);
    }
    if (empty($userEmail)) {
      //$EmailError = "Please enter an email address";
      $error['EmailError'] = "Please enter an email address";
    }else {
      $userEmail = test_user_input($userEmail);
    }
    if (empty($password)) {
      //$PasswordError = "Please enter a password";
      $error['PasswordError'] = "Please enter a password";
    }else {
      $password = test_user_input($password);
    }
    if ($confPass !== $password) {
      //$ConfPasswordError = "Invalid password";
      $error['ConfPasswordError'] = "Password does no match";
    }
    /*
    if (count($error) === 0) {
      $HashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $token = bin2hex(random_bytes(50));
      $verified = false;

      $stm = $handle->prepare("INSERT INTO new_users (username, email, password, verified, token) VALUES (:username, :email, :password, :verified, :token)");
      $stm->bindParam(':username', $username);
      $stm->bindParam(':email', $userEmail);
      $stm->bindParam(':password', $HashedPassword);
      $stm->bindParam(':verified', $verified);
      $stm->bindParam(':token', $token);

      if ($stm->execute()) {
        $user_id = $handle->lastInsertId();

        $_SESSION['id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['user-email'] = $userEmail;
        $_SESSION['verified'] = $verified;

        $_SESSION['message'] = "You are now logged in";
        header('location: php/index.php');
        exit();
      }else {
        $error['db_error'] = "Database error: failed to register";
      }
      header('location: create.php');
    }*/
/*
    function FunctionName($daemail)
    {
      $emailQuery = "SELECT * FROM new_users WHERE email=? LIMIT 1";
      $emailstmt = $handle->prepare($emailQuery);
      $emailstmt = bindParam(':email', $daemail);
      $emailstmt->execute();
      $emailResult = $emailstmt->fetch();
      $emailCount = $emailResult->rowCount();

      if ($emailCount > 0) {
        $error['EmailError'] = "Email already exists";
      }
    }

    function FunctionName($dausername)
    {
      $usernameQuery = "SELECT * FROM new_users WHERE username=? LIMIT 1";
      $usernamestmt = $handle->prepare($usernameQuery);
      $usernamestmt = bindParam(':username', $dausername);
      $usernamestmt->execute();
      $usernameResult= $usernamestmt->fetch();
      $usernameCount = $usernameResult->rowCount();

      if ($usernameCount > 0) {
        $error['UserNameError'] = "Username already exists";
      }
    }*/

    $emailQuery = "SELECT * FROM new_users WHERE email=? LIMIT 1";
    $usernameQuery = "SELECT * FROM new_users WHERE username=? LIMIT 1";
    $emailstmt = $handle->prepare($emailQuery);
    $usernamestmt = $handle->prepare($usernameQuery);
    //$emailstmt->bindParam(':email', $userEmail);
    $emailstmt->bind_param('s', $userEmail);
    $usernamestmt->bindParam(':username', $username);
    $emailstmt->execute([$userEmail]);
    $usernamestmt->execute([$username]);
    $emailResult = $emailstmt->fetch();
    $usernameResult= $usernamestmt->fetch();
    $emailCount = $emailResult->rowCount();
    $usernameCount = $usernameResult->rowCount();
  /*  try {
      if ($emailCount === 0) {
        echo "It works";
      }else {
        throw new Exception("Email already exists", 1);
      }
    } catch (Exception $ex) {
      $error['EmailError'] = $ex;
    }
*/
    if ($emailCount > 0) {
      $error['EmailError'] = "Email already exists";
    }
    if ($usernameCount > 0) {
      $error['UserNameError'] = "Username already exists";
    }
    if (count($error) === 0) {
      //header("location: create.php");
      $HashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $token = bin2hex(random_bytes(50));
      $verified = false;

      $stm = $handle->prepare("INSERT INTO new_users (username, email, password, verified, token) VALUES (:username, :email, :password, :verified, :token)");
      $stm->bindParam(':username', $username);
      $stm->bindParam(':email', $userEmail);
      $stm->bindParam(':password', $HashedPassword);
      $stm->bindParam(':verified', $verified);
      $stm->bindParam(':token', $token);

      if ($stm->execute()) {
        $user_id = $handle->lastInsertId();

        $_SESSION['id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['user-email'] = $userEmail;
        $_SESSION['verified'] = $verified;

        $_SESSION['message'] = "You are now logged in";
        header('location: php/index.php');
        exit();
      }else {
        $error['db_error'] = "Database error: failed to register";
      }
    }
  }
?>
