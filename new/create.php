<?php
    require_once 'reconnect.php';
    // $username;
    // $userEmail;
    // $password;

    function insert2table($handle, $userdata, $emaildata, $userpass){
      try {
        $HashedPassword = password_hash($userpass, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = 0;

        $stmt = $handle->prepare("INSERT INTO new_users (username, email, password, verified, token) VALUES (:username, :email, :password, :verified, :token)");
        $stmt->bindParam(':username', $userdata);
        $stmt->bindParam(':email', $emaildata);
        $stmt->bindParam(':password', $HashedPassword);
        $stmt->bindParam(':verified', $verified);
        $stmt->bindParam(':token', $token);

        $stmt->execute();
        if ($stmt->rowCount() == 1) {
          echo "Registration Successful...";
        }
      } catch (PDOException $e) {
        die("Failed to insert data to database").$e->getMessage();
      }
    }
?>
