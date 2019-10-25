<?php
  require 'connect.php';
  $emailError = "";
  $nameError = "";
  $usernameError = "";
  $passwordError = "";
  $ConfirmUserPasswordError = "";
  if (isset($_POST['submit'])) {
    // $Email = $_POST['user-email'];
    // $Name = $_POST['fullname'];
    // $UserName = $_POST['username'];
    // $PasswordUserInput = $_POST['passwd'];
    // $ConfirmUserPassword = $_POST['confPasswd'];
    //$HashedPassword = password_hash($PasswordUserInput, PASSWORD_DEFAULT);

    if (isset($_POST['submit'])) {
      if (empty($_POST['user-email'])) {
        $emailError = 'Email is required';
      }else {
        $Email = test_user_input($_POST['user-email']);
      }
      if (!filter_var($_POST['user-email'], FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid email address';
      }
      if (empty($_POST['fullname'])) {
        $nameError = 'Full Name is required';
      }else {
        $Name = test_user_input($_POST['fullname']);
        if (!preg_match("/^[A-Za-z. ]*$/", $Name)) {
          $nameError = "Only letters and white spaces are allowed";
        }
      }
      if (empty($_POST['username'])) {
        $usernameError = 'Username is required';
      }else {
        $UserName = test_user_input($_POST['username']);
      }
      if (empty($_POST['passwd'])) {
        $passwordError = 'Password is required';
      }else {
        $Password = test_user_input($_POST['passwd']);
      }
      if ($_POST['passwd'] !== $_POST['confPasswd']) {
        $ConfirmUserPasswordError = 'Passwords do not match';
      }else {
        $ConfirmUserPassword = test_user_input($_POST['confPasswd']);
      }
      email_validation($_POST['user-email']);
      username_validation($_POST['username']);
    }
    function test_ user_input ($data) {
      return $data;
    }

    function email_validation($emailInput)
    {
      $stmt = $handle->prepare("SELECT * FROM new_users WHERE email=? LIMIT 1");
      // $stmt->execute([$emailInput]);
      // $user = $stmt->fetch();
      $stmt->bindParam(':email', $emailInput);
      $stmt->execute();
      $result = $stmt->fetch();
      $userCount = $result->num_rows;

      if ($userCount > 0) {
        $emailError = 'Email already exists!!! Please enter a new email.';
      }

      if ($user) {
        echo "Email already exists please enter another email.";
      }else {
        $stm = $handle->prepare("INSERT INTO new_users (email, fullname, username, password) VALUES (:email, :fullname, :username, :password)");
        $stm->bindParam(':email', $emailInput);
        $stm->bindParam(':fullname', $Name);
        $stm->bindParam(':username', $UserName);
        $stm->bindParam(':password', $HashedPassword);

        $stm->execute();
        echo "Registration Successful...";
        $stm->close();

      }
      $stmt->close();
      $handle->close();
    }

    function username_validation($usernameInput)
    {
      $stmt = $handle->prepare("SELECT * FROM new_users WHERE username=? LIMIT 1");
      $stmt->execute([$usernameInput]);
      $user = $stmt->fetch();

      if ($user) {
        echo "Username already exists please enter another username.";
      }else {
        $stm = $handle->prepare("INSERT INTO new_users (email, fullname, username, password) VALUES (:email, :fullname, :username, :password)");
        $stm->bindParam(':email', $Email);
        $stm->bindParam(':fullname', $Name);
        $stm->bindParam(':username', $usernameInput);
        $stm->bindParam(':password', $HashedPassword);

        $stm->execute();
        echo "Registration Successful...";
        $stm->close();

      }
      $stmt->close();
      $handle->close();
    }
  }
?>
