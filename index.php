<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="res/water-level.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="assets/js/lib/jquery-3.6.0.min.js"></script>
    <script src="assets/js/lib/chart.min.js"></script>
    <script src="assets/js/lib/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="assets/css/final.css"> -->
    <link rel="stylesheet" href="assets/css/test.css">
    <title>SWLMS</title>
</head>

<body>
    <!-- Hide Header in mobile view -->
    <!-- <header>
        <section class="title">
            <h1>Smart Water Level Monitoring System</h1>
            <img src="res/water-level.png" alt="">
        </section>
        <section class="nav">
            <button onclick="showDateReadings()">View Date Readings</button>
            <button onclick="showLiveReadings()">View Live Readings</button>
            <button onclick="showDeviceList()">View Device List</button>
            <button onclick="CopyURL()">Copy URL/Link</button>
            <button onclick="userGuide()">USER GUIDE</button>
        </section>
    </header> -->
    <header>
        <a href="#" title="Smart Water Level Monitoring System" rel="noopener noreferrer">
            <i class="ri-contrast-drop-fill"></i>
            <span>SWLMS</span>
        </a>
        <ul class="navbar">
            <li>
                <a href="?dateReadings" class="active" rel="noopener noreferrer">
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
                <a href="#" class="" onclick="CopyURL()" rel="noopener noreferrer">
                    <i class="ri-links-fill"></i>
                    <span>Share Link</span>
                </a>
            </li>
        </ul>
        <div class="main">
            <a href="https://github.com/Hypo8777/finals_thesis" target="_blank" rel="noopener noreferrer">
                <i class="ri-github-fill"></i>
                <span>GitHub</span>
            </a>
            <a href="https://scribehow.com/shared/Workflow__saa3U42xRC28hh9bLebDKg" target="_blank" rel="noopener noreferrer">
                <i class="ri-guide-fill"></i>
                <span>Guide</span>
            </a>
            <div class="sbx sbx-menu" id="menu-icon">lll</div>
        </div>
    </header>
    <div class="content">
        <?php

        if (isset($_GET['dateReadings'])) {
            include_once("includes/date_readings.php");
        } else if (isset($_GET['liveReadings'])) {
            include_once("includes/live_readings.php");
        } else if (isset($_GET['deviceList'])) {
            include_once("includes/device_list.php");
        } else {
            include_once("includes/date_readings.php");
        }

        include_once("includes/indicator_description.php");
        ?>
    </div>
    <script>
        let menu = document.querySelector('#menu-icon');
        let navbar = document.querySelector('.navbar');
        menu.addEventListener('click', () => {
            navbar.classList.toggle('open');
        });
        // function showDateReadings() {
        //     window.location.href = '?dateReadings';
        // }

        // function showLiveReadings() {
        //     window.location.href = '?liveReadings'
        // }

        // function showDeviceList() {
        //     window.location.href = '?deviceList'
        // }

        // function userGuide() {
        //     window.open("https://scribehow.com/shared/Workflow__saa3U42xRC28hh9bLebDKg", "");
        // }

        function CopyURL() {
            var loc = window.location.href;
            navigator.clipboard.writeText(loc).then(
                () => {
                    swal("COPY URL", "URL COPIED '" + loc + "'", {
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