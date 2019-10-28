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
    if (count($error) === 0) {
      //echo "Success biyatch";
      require('create.php');
      //header('Location: create.php');
      // $username = $_POST['username'];
      // $userEmail = $_POST['user-email'];
      // $password = $_POST['passwd'];
      // $confPass = $_POST['confPasswd'];

      // $HashedPassword = password_hash($password, PASSWORD_DEFAULT);
      // $token = bin2hex(random_bytes(50));
      // $verified = false;
      //
      // $stmt = $handle->prepare("INSERT INTO new_users (username, email, password, verified, token) VALUES (:username, :email, :password, :verified, :token)");
      // $stmt->bindParam(':username', $username);
      // $stmt->bindParam(':email', $userEmail);
      // $stmt->bindParam(':password', $HashedPassword);
      // $stmt->bindParam(':verified', $verified);
      // $stmt->bindParam(':token', $token);
      //
      // $stmt->execute();
      // echo "Registration Successful...";
      // $stmt->close();
      // $handle->close();
    }

  }
?>
