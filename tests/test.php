<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=test.php">
    <title>Test</title>
</head>

<body>
    <style>
        * {
            font-family: "Poppins";
        }

        body {
            background-color: rebeccapurple;
        }

        p {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            padding: 2em;
            color: white;
            text-shadow: 3px 3px black;
        }

        .online {
            background-color: darkgreen;
        }

        .offline {
            background-color: crimson;
        }
    </style>
    <?php

    function runTest()
    {
        date_default_timezone_set('Asia/Manila');
        $msg = "";
        $time = date("h:i:s A");
        function conn()
        {
            $conn = new mysqli("localhost", "root", "", "device_db");
            if (!$conn) {
                return "No Connection";
            } else {
                return $conn;
            }
        }
        if (!conn()) {
            echo "Not Connected";
        } else {
            // Code....
            // Inputs
            $device = "SWLMD-001"; //From Device Inputs
            $location = "Location Name"; //From Device Inputs
            $is_active = 1; //Inserted as default          
            $sensor_data = rand(1, 3); // From Device Inputs

            // Check if Device Exists
            $CheckDevice = "SELECT device FROM devices_v WHERE device = '$device'";
            $query_CheckDevice = mysqli_query(conn(), $CheckDevice);
            if (mysqli_num_rows($query_CheckDevice) !== 0) // the '!==0' is when the results returns anything other than 0
            {
                // Check if Device is offline/online
                $checkDeviceStatus = "SELECT device,is_active FROM devices_v WHERE device = '$device' AND is_active = '$is_active'";
                $query_checkDeviceStatus = mysqli_query(conn(), $checkDeviceStatus);
                if (mysqli_num_rows($query_checkDeviceStatus) !== 0) // the '!==0' is when the results returns anything other than 0
                {
                    // --> Online Inser Device Readings
                    $msg .= "<p class='online'>Device is Online == " . $time . "</p>";
                    echo $msg;
                    $AddReadings = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES('$device','$sensor_data')";
                    mysqli_query(conn(), $AddReadings);
                } else {
                    // --> Offline == DO Nothing
                    $msg .=  "<p class='offline'>Device is Offline! == " . $time . "<p>";
                    echo $msg;
                }
            } else {
                // Add Device Information
                $AddDevice = "INSERT INTO devices_tbl(device_id,location,is_active) VALUES('$device','$location','$is_active')";
                mysqli_query(conn(), $AddDevice);
                // Add Readings
                $AddReadings = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES('$device','$sensor_data')";
                mysqli_query(conn(), $AddReadings);
            }
        }
    }



    // runTest(); // Uncomment to run test


    ?>
</body>

</html>