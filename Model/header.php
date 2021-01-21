<?php
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri === '/Camagru/index.php' || $uri === "/Camagru/")
        $title = 'Camagru';
    else if ($uri === '/Camagru/login.php')
        $title = 'Login';
    else if ($uri === '/Camagru/register.php')
        $title = 'Register';
    else if ($uri === '/Camagru/profile.php')
        $title = 'Profile';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="/Camagru/css/cam.css">
        <title><?php echo $title?></title>
        <!-- <link rel="icon" href="icon.png" type="image/png" sizes="16x16"> -->
    </head>
    <body>
        <div class="container"></div>
        <nav id="navBar">
        <ul class="navHeader">
            <li>
                <a href="/Camagru/" id="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu"
                        viewBox="0 0 16 16">
                        <path
                            d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                    </svg>Camagru
                </a>
            </li>
        </ul>
        <div class="toggler">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <ul class="mainNavBar">
            <li>
                <a href="/Camagru/View/register.php">Register</a>
            </li>
            <li>
                <a href="/Camagru/View/login.php">Login</a>
            </li>
            <li>
                <a href="/Camagru/View/profile.php">Profile</a>
            </li>
            <li>
                <a id="callToAction" href="#">logout</a>
            </li>
        </ul>
    </nav>