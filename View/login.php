<?php require_once '../Model/header.php'?>
<div class="form">
    <h2>
        Welcome to login
    </h2>
    <br>
    <div class="form-container loginForm">
        <form class="sign" action="login.php" method="POST">
            <input type="text" name="username-email" class="userEntry" value="" placeholder="Email or username"><br><br>
            <input type="password" name="log-passwd" class="userEntry" value="" placeholder="Password"><br><br>
            <input type="submit" name="login-btn" value="Log In"><br>
            <a href="forgot.php">Forgot Password?</a>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</div>
<?php require_once '../Model/footer.php'?>