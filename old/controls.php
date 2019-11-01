<?php
  //session_start();
  //require 'connect.php';

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
     }
    // if ($usernameCount > 0) {
    //   $error['UserNameError'] = "Username already exists";
    // }
    if (count($error) === 0) {
      require('create.php');
      header('Location: ../index.php');
    }

  }
?>