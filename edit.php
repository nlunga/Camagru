<?php
    require_once 'reconnect.php';
    require_once 'controls.php';

    $error = array();
    $username = "";
    $email = "";
    $table = "new_users";
    $id = $_SESSION['id'];

    function getUsername($table_name, $userId) {
        global $handle;
        $sql = "SELECT * FROM $table_name WHERE id='$userId' LIMIT 1";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['username'];
    }

    function getEmail($table_name, $userId) {
        global $handle;
        $sql = "SELECT * FROM $table_name WHERE id='$userId' LIMIT 1";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['email'];
    }

    function getPassword($table_name, $userId) {
        global $handle;
        $sql = "SELECT * FROM $table_name WHERE id='$userId' LIMIT 1";
        $stmt = $handle->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['password'];
    }

    if (isset($_POST['username-btn'])) {
        $username = trim($_POST['username']);
        if (empty($username)) {
            $error['UserNameError'] = "Please enter a username";
        }else {
            $username = test_user_input($username);
            // getUsername($table, $id);

            try {
                $newsql = "UPDATE new_users SET username='$username' WHERE id='$id'";
                $stmt = $handle->prepare($newsql);
                $stmt->execute();
            } catch (PDOExeption $e) {
                echo "Failed to update the Username ".$e->getMessage();
            }
        }
    }

    if(isset($_POST['email-btn'])) {
        $email = trim($_POST['user-email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['EmailError'] = "Email address is invalid";
        }
        if (empty($email)) {
            $error['EmailError'] = "Please enter an email address";
        }else {
            $email = test_user_input($email);
            
            try {
                $newsql = "UPDATE new_users SET email='$email' WHERE id='$id'";
                $stmt = $handle->prepare($newsql);
                $stmt->execute();
            } catch (PDOExeption $e) {
                echo "Failed to update the Email address ".$e->getMessage();
            }
        }
        
    }

    if (isset($_POST['pass-btn'])) {
        $old = trim($_POST['oldPass']);
        $new = trim($_POST['newPass']);
        $conf = trim($_POST['confPass']);
        
        if (empty($old) || empty($new) || empty($conf)) {
            $error['PasswordError'] = "Please enter a password";
        }else {
            $old = test_user_input($old);
            $new = test_user_input($new);
            $conf = test_user_input($conf);
            $newhash = password_hash($new, PASSWORD_DEFAULT);
            if (password_verify($old, getPassword($table, $id))) {
                if ($new !== $conf) {
                    $error['ConfPasswordError'] = "Password does no match";
                } else {
                    echo getPassword($table, $id);
                    try {
                        $newsql = "UPDATE new_users SET password='$newhash' WHERE id='$id'";
                        $stmt = $handle->prepare($newsql);
                        $stmt->execute();
                    } catch (PDOExeption $e) {
                        echo "Failed to update the Password ".$e->getMessage();
                    }
                }
            }else {
                $error['PasswordError'] = "Old Password does not match";
                // exit();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
    <?php
        if (count($error)>0) {
            echo "<ul>";
            foreach ($error as $errors) {
              echo "<li>" . $errors . "</li><br>";
            }
            echo "</ul>";
        }
    ?>
    <fieldset style="width: 60%; border-radius: 5px;">
        <legend>Edit User Info</legend>
        <form action="edit.php" method="post">
            <label for="username">Username: </label><br>
            <input style="margin-left: 50px" type="text" name="username" id="username" value="" placeholder="Username">
            <input type="submit" name="username-btn" value="Update"><br>
        </form>
        <form action="edit.php" method="post">
            <label for="email">Email: </label><br>
            <input style="margin-left: 50px" type="email" name="user-email" id="email" value="" placeholder="Email">
            <input type="submit" name="email-btn" value="Update"><br>
        </form>
        <form action="edit.php" method="post">
            <label for="oldPass">Old Password: </label><br>
            <input style="margin-left: 50px" type="password" name="oldPass" id="oldPass" value="" placeholder="Old Password"><br>
            <label for="newPass">New Password: </label><br>
            <input style="margin-left: 50px" type="password" name="newPass" id="newPass" value="" placeholder="New Password"><br>
            <label for="confPass">Confirm Password: </label><br>
            <input style="margin-left: 50px" type="password" name="confPass" id="confPass" value="" placeholder="Confirm Password">
            <input type="submit" name="pass-btn" value="Update"><br>
        </form>
        
    </fieldset>
</body>
</html>