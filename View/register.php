<?php require_once '../Model/header.php'?>
<div class="form">
    <h2>
        Welcome to Register
    </h2>
    <br>
    <div class="form-container loginForm">
        <form class="sign" action="login.php" method="POST">
            <input type="text" name="username" class="userEntry" value="" placeholder="Prefered username"><br>
            <input type="email" name="user-email" class="userEntry" value="" placeholder="Email"><br>
            <input type="password" name="passwd" class="userEntry" value=""  placeholder="Password"><br>
            <input type="password" name="confPasswd" class="userEntry" value="" placeholder="Confirm Password"><br>
            <input type="submit" name="submit" value="Sign up"><br>
            <p>Have an account? <a href="login.php">Log in</a></p>
        </form>
    </div>

    <form class="sign" action="signup.php" method="POST">
        
      </form>
</div>
<?php require_once '../Model/footer.php'?>