<?php

session_start();

if ($_SESSION['access'] !== 1) {
    session_destroy();
    header("location: auth.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="600; url=admin.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/lib/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/js/lib/sweetalert.min.js"></script>
    <link type="text/css" rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <title>Admin</title>
</head>

<body>
    <nav>
        <a href="index.php" class="active" title="Smart Water Level Monitoring System" rel="noopener noreferrer">
            <i class="ri-contrast-drop-fill"></i>
            <span>SWLMS</span>
        </a>
        <ul class="navbar">
            <li>
                <a href="?users">
                    <i class="ri-shield-user-fill"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="?deviceList">
                    <i class="ri-device-fill"></i>
                    <span>Device List</span>
                </a>
            </li>
        </ul>
        <div class="main">
            <a href="logout.php" class="logout">
                <i class="ri-logout-box-fill"></i>
                <span>Logout</span>
            </a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </nav>
    <br><br>
    <div class="content">
        <?php
        if (isset($_GET['deviceList'])) {
            include("includes/include_device_list.php");
        } else if (isset($_GET['users'])) {
            include("includes/include_users.php");
        } else {
            include("includes/include_device_list.php");
        }
        ?>
    </div>
    <br><br>
    <script>
        let menu = document.querySelector('#menu-icon');
        let navbar = document.querySelector('.navbar');
        menu.addEventListener('click', () => {
            menu.classList.toggle('bx-x');
            navbar.classList.toggle('open');
        });
    </script>
</body>

</html>