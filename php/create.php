<?php
  require_once("connect.php");

  $Email = $_POST['user-email'];
  $Name = $_POST['fullname'];
  $UserName = $_POST['username'];
  $PasswordUserInput = $_POST['passwd'];
  $HashedPassword = password_hash($PasswordUserInput, PASSWORD_DEFAULT);

  $stmt = $handle->prepare("SELECT * FROM new_users WHERE email=?");
  //$stmt->execute();
  $stmt->execute([$Email]);
  //$stmt->execute(array(':email' => $Email, ':username' => $UserName));
  $user = $stmt->fetch();

  if ($user) {
    //if ($user['email'] == $Email) {
      echo "Email already exists please enter another email.";
    //}
    //if ($user['username'] == $UserName){
    //    echo "User name already exists please enter another user name";
    //}
  }
  else {
    $stm = $handle->prepare("INSERT INTO new_users (email, fullname, username, password) VALUES (:email, :fullname, :username, :password)");
    $stm->bindParam(':email', $Email);
    $stm->bindParam(':fullname', $Name);
    $stm->bindParam(':username', $UserName);
    $stm->bindParam(':password', $HashedPassword);
  }
  // $stmt = $handle->prepare("INSERT INTO new_users (email, fullname, username, password) VALUES (:email, :fullname, :username, :password)");
  // $stmt->bindParam(':email', $Email);
  // $stmt->bindParam(':fullname', $Name);
  // $stmt->bindParam(':username', $UserName);
  // $stmt->bindParam(':password', $HashedPassword);

  $stm->execute();
  echo "Registration Successful...";
  $stmt->close();
  $stm->close();
  $handle->close();
?>
