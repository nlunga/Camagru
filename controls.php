<?php
  $UserNameError = "";
  $EmailError = "";
  $PasswordError = "";
  $ConfPasswordError = "";

  $username = $_POST['username'];
  $userEmail = $_POST['user-email'];
  $password = $_POST['passwd'];
  $confPass = $_POST['confPasswd'];

  function test_user_input ($data) {
    return $data;
  }

  if (isset($_SERVER['REQUEST_METHOD']) === 'POST') {
    if (empty($username)) {
      $UserNameError = "Please enter an email";
    }else {
      $username = test_user_input($username);
    }
  }
?>
