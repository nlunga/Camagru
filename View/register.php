<?php
    require_once '../Controller/controls.php';
    require_once '../Model/header.php';
?>
<div class="form">
    <h2>
        Welcome to Register
    </h2>
    <br>
    <!-- <div class="alert alert-danger error_message" role="alert"> -->
        <?php
            if (count($error)>0) {
                echo "<ul>";
                    echo '<div class="alert alert-danger error_message" role="alert" style="width: 50%; text-align:center;">';
                        foreach ($error as $errors) {
                            echo "<li>" . $errors . "</li>";
                        }
                    echo '</div>';
                echo "</ul>";
            }
        ?>
    <!-- </div> -->

    <div class="form-container loginForm">
        <form class="sign" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <input type="text" name="username" class="userEntry" value="" placeholder="Prefered username"><br><br>
            <input type="email" name="user-email" class="userEntry" value="" placeholder="Email"><br><br>
            <input type="password" name="passwd" class="userEntry" value=""  placeholder="Password"><br><br>
            <input type="password" name="confPasswd" class="userEntry" value="" placeholder="Confirm Password"><br><br>
            <input type="submit" name="submit" value="Sign up"><br><br>
            <p>Have an account? <a href="/Camagru/View/login.php">Log in</a></p>
        </form>
    </div>

    <form class="sign" action="signup.php" method="POST">
        
      </form>
</div>
<?php require_once '../Model/footer.php';?>