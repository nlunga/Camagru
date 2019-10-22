<?php
  require_once("connect.php");

  $Email = $_POST['user-email'];
  $Name = $_POST['fullname'];
  $UserName = $_POST['username'];
  $PasswordUserInput = $_POST['passwd'];
  $HashedPassword = password_hash($PasswordUserInput, PASSWORD_DEFAULT);

  $stmt = $handle->prepare("INSERT INTO new_users (email, fullname, username, password) VALUES (:email, :fullname, :username, :password)");
  $stmt->bindParam(':email', $Email);
  $stmt->bindParam(':fullname', $Name);
  $stmt->bindParam(':username', $UserName);
  $stmt->bindParam(':password', $HashedPassword);

  $stmt->execute();
  echo "Registration Successful...";
  $stmt->close();
  $handle->close();
?>
