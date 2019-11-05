<?php
  //session_start();
  include 'create.php';

  // $UserNameError = "";
  // $EmailError = "";
  // $PasswordError = "";
  // $ConfPasswordError = "";

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
?>
