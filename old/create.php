<?php
    require_once 'connect.php';

    print_r($_POST);

    // $username = $_POST['username'];
    // $userEmail = $_POST['user-email'];
    // $password = $_POST['passwd'];
    // $confPass = $_POST['confPasswd'];
    $HashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50));
    $verified = 0;
    //echo "Valid user";
    // $HashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // $token = bin2hex(random_bytes(50));
    // $verified = false;


    // $stm = $handle->prepare("INSERT INTO new_users (username, email, password) VALUES (:username, :email, :password)");
    // $stm->bindParam(':username', $username);
    // $stm->bindParam(':email', $userEmail);
    // $stm->bindParam(':password', $HashedPassword);

    $stmt = $handle->prepare("INSERT INTO new_users (username, email, password, verified, token) VALUES (:username, :email, :password, :verified, :token)");
    // $stmt->bindParam(':username', $username);
    // $stmt->bindParam(':email', $userEmail);
    // $stmt->bindParam(':password', $HashedPassword);
    // $stmt->bindParam(':verified', $verified);
    // $stmt->bindParam(':token', $token);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $userEmail);
    $stmt->bindParam(':password', $HashedPassword);
    $stmt->bindParam(':verified', $verified);
    $stmt->bindParam(':token', $token);

    $stmt->execute();
    echo "Registration Successful...";

    //$handle->close();
      //$stmt->close();
?>
