<?php

session_start();

if (!isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
    header("location: auth.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="res/water-level.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script type="text/javascript" src="assets/js/lib/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/js/lib/chart.min.js"></script>
    <script type="text/javascript" src="assets/js/lib/sweetalert.min.js"></script>
    <link type="text/css" rel="stylesheet" href="assets/css/index.css">
    <link type="text/css" rel="stylesheet" href="assets/css/nav.css">
    <link type="text/css" rel="stylesheet" href="assets/css/content.css">
    <link type="text/css" rel="stylesheet" href="assets/css/description.css">
    <title>SWLMS</title>
</head>

<body>

    <nav>
        <a href="index.php" class="active" title="Smart Water Level Monitoring System" rel="noopener noreferrer">
            <i class="ri-contrast-drop-fill"></i>
            <span>SWLMS</span>
        </a>
        <ul class="navbar">
            <li>
                <a href="?dateReadings" rel="noopener noreferrer">
                    <i class="ri-calendar-todo-fill"></i>
                    <span>Date Readings</span>
                </a>
            </li>
            <li>
                <a href="?liveReadings" class="" rel="noopener noreferrer">
                    <i class="ri-line-chart-fill"></i>
                    <span>Live Readings</span>
                </a>
            </li>
            <li>
                <a href="?deviceList" class="" rel="noopener noreferrer">
                    <i class="ri-file-list-2-fill"></i>
                    <span>Devices List</span>
                </a>
            </li>
            <li>
                <a href="#" class="" onclick="CopyURL()">
                    <i class="ri-links-fill"></i>
                    <span>Share Link</span>
                </a>
            </li>
            <li>
                <a href="https://scribehow.com/shared/Smart_Water_Level_Monitoring_System__LRFb-KqsQuCokk1FdEuOBw" target="_blank" rel="noopener noreferrer">
                    <i class="ri-guide-fill"></i>
                    <span>Guide</span>
                </a>
            </li>
            <!-- <li>
                <a href="logout.php" class="logout">
                    <i class="ri-logout"></i>
                    <span>Logout</span>
                </a>
            </li> -->
        </ul>
        <div class="main">
            <!-- <a href="https://github.com/Hypo8777/finals_thesis" target="_blank" rel="noopener noreferrer">
                <i class="ri-github-fill"></i>
                <span>GitHub</span>
            </a> -->
            <!-- <a href="https://scribehow.com/shared/Smart_Water_Level_Monitoring_System__LRFb-KqsQuCokk1FdEuOBw" target="_blank" rel="noopener noreferrer">
                <i class="ri-guide-fill"></i>
                <span>Guide</span>
            </a> -->
            <?php
            if ($_SESSION['access'] == 1) {
            ?>
                <a href="admin.php">
                    <i class="ri-user-settings-fill"></i>
                    <span>Admin</span>
                </a>
            <?php
            }
            ?>
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
        if (isset($_GET['dateReadings'])) {
            include("includes/include_date_readings.php");
        } else if (isset($_GET['liveReadings'])) {
            include("includes/include_live_readings.php");
        } else if (isset($_GET['deviceList'])) {
            include("includes/include_device_list.php");
        } else {
            include("includes/include_date_readings.php");
        }
        ?>
    </div>
    <footer>
        <section class="indicators">
            <h3>Water Levels</h3>
            <details open>
                <summary class="normal"><i id="level1" class="ri-drop-fill"></i> <span>Water Level 1</span></summary>
                <p>Water Level is normal.</p>
            </details open>
            <details open>
                <summary class="mid"><i id="level2" class="ri-drop-fill"></i> <span>Water Level 2</span></summary>
                <p> Water Level is fluctiating and has a posibility of increasing to level 3</p>
            </details open>
            <details open>
                <summary class="danger"><i id="level3" class="ri-drop-fill"></i> <span>Water Level 3</span></summary>
                <p>Water Level is over the set limit and require immediate response</p>
            </details open>
        </section>
    </footer>
    <script>
        let menu = document.querySelector('#menu-icon');
        let navbar = document.querySelector('.navbar');
        menu.addEventListener('click', () => {
            menu.classList.toggle('bx-x');
            navbar.classList.toggle('open');
        });

        function CopyURL() {
            var currURL = window.location.href;
            navigator.clipboard.writeText(currURL).then(
                () => {
                    swal("COPY URL", "URL COPIED '" + currURL + "'", {
                        icon: "success",
                        closeOnEsc: true,
                        button: false
                    })
                },
                () => {
                    swal("COPY URL", "COPY FAILED", {
                        icon: "ERROR",
                        closeOnEsc: true,
                        button: false
                    })
                }
            );
        }
    </script>
</body>

</html>