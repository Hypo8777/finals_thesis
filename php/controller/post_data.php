<?php

require "../model/database.php";
date_default_timezone_set('Asia/Manila');

class post_data extends DBConn
{
    public function insert_data($device_id, $device_location, $device_data)
    {
        try {
            //code...
            $conn = parent::set_connection();
            // Checks if the device is active or inactive
            $query_check_active = "SELECT device_id, is_active FROM devices_tbl WHERE device_id = ? AND is_active = ?";
            $_check_active = $conn->prepare($query_check_active);
            $_check_active->execute([$device_id, 1]);
            if ($_check_active->rowCount() !== 0) {
                // Checks if device already exist in the database
                $query_check_device = "SELECT device_id FROM devices_tbl WHERE device_id = '$device_id'";
                $_check_device = $conn->query($query_check_device);
                if ($_check_device->rowCount() !== 0) {
                    // Inserts device sensor readings
                    $query_insert = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
                    $_insert = $conn->prepare($query_insert);
                    $_insert->execute([$device_id, $device_data]);
                } else {
                    // If Device does not exist in the database
                    // Inserts Device information
                    $query_insert_device =  "INSERT INTO devices_tbl(device_id,`location`) VALUES(?,?)";
                    $_insert_device = $conn->prepare($query_insert_device);
                    $_insert_device->execute([$device_id, $device_location]);
                    // Inserts device sensor readings
                    $query_insert = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
                    $_insert = $conn->prepare($query_insert);
                    $_insert->execute([$device_id, $device_data]);
                }
            } else {
                // Do Nothing
            }
        } catch (PDOException $th) {
            die('ERROR : ' . $th->getMessage() . "<br>");
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $device_id =     $_POST['d_id']; //device_id
    $device_location = $_POST['d_l']; // Device Location
    $sensor_data =      $_POST['d_d'];  //sensor_data

    $init = new post_data;
    $init->insert_data(
        $device_id,
        $device_location,
        $sensor_data
    );
}
