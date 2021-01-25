<?php
    require_once '../Controller/controls.php';
    require_once '../Model/header.php';
    /*if (isset($_GET['token'])) {
        $token = $_GET['token'];
        verifyUser($token);
    }

    if (isset($_GET['password-token'])) {
        $passwordToken = $_GET['password-token'];
        resetPassword($passwordToken);
    }

    if (!isset($_SESSION['id'])) {
        header('location: signup.php');
        exit();
    }*/
?>
<div class="tester">

    <div class="custView ">
        <!-- <div class="alert alert-success  d-flex justify-content-center regAlertTest" role="alert"> -->
        <p>You have successfully registered your account, you need to verify your email. Sign in with your email account and click on the verification link we just emailed you at <strong><?php echo $_SESSION['email']; ?></strong></p>
    </div>
</div>
<?php require_once '../Model/footer.php'?>