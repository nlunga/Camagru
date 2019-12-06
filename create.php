<?php
    require_once 'reconnect.php';

    function insert2table($handle, $userdata, $emaildata, $userpass){
      try {
        $HashedPassword = password_hash($userpass, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = 0;
        $note = "yes";

        $stmt = $handle->prepare("INSERT INTO new_users (username, email, password, verified, token, notifications) VALUES (:username, :email, :password, :verified, :token, :notifications)");
        $stmt->bindParam(':username', $userdata);
        $stmt->bindParam(':email', $emaildata);
        $stmt->bindParam(':password', $HashedPassword);
        $stmt->bindParam(':verified', $verified);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':notifications', $note);

        //$stmt->execute();
        if ($stmt->execute()) {
          $user_id = $handle->lastInsertId();
          $_SESSION['id'] = $user_id;
          $_SESSION['username'] = $userdata;
          $_SESSION['email'] = $emaildata;
          $_SESSION['verified'] = $verified;

          mail($_SESSION['email'], "Verify your email", "Click the link below to verify: http://localhost:8080/Camagru/new/index.php?token=$token");

          $_SESSION['message'] = "You are now logged in";
          header('Location: verify_message.php');
          exit();
          //echo "New record created successfully. Last inserted ID is: " . $user_id;
        }
        if ($stmt->rowCount() == 1) {
          echo "Registration Successful...";
        }
      } catch (PDOException $e) {
        echo "Failed to insert data to database".$e->getMessage();
      }
    }
?>
