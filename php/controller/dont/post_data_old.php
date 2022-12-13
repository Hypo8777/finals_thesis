<?php

require "database.php";
date_default_timezone_set('Asia/Manila');

class post_data extends DBConn
{
    public function insert_data($device_id, $device_location, $device_data)
    {
        try {
            //code...
            $conn = parent::set_connection();
            $query_check_device = "SELECT device_id FROM devices_tbl WHERE device_id = '$device_id'";
            $_check_device = $conn->query($query_check_device);
            if ($_check_device->rowCount() !== 0) {
                // If device exist insert readings
                $query_insert = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
                $_insert = $conn->prepare($query_insert);
                $_insert->execute([
                    $device_id, $device_data
                ]);
            } else {
                // Add device
                $query_insert_device =  "INSERT INTO devices_tbl(device_id,`location`,is_active) VALUES(?,?,?)";
                $_insert_device = $conn->prepare($query_insert_device);
                $_insert_device->execute([$device_id, $device_location, 1]);
                // Add readings
                $query_insert = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
                $_insert = $conn->prepare($query_insert);
                $_insert->execute([
                    $device_id, $device_data
                ]);
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
