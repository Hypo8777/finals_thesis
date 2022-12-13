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
            // TODO Check if Device Exists
            // $query_CheckDevice = "SELECT device FROM devices_v WHERE device = ?";
            // $_CheckDevice = $conn->prepare($query_CheckDevice);
            // $_CheckDevice->execute([$device_id]);
            // if ($_CheckDevice->rowCount() !== 0) {
            //     //TODO Check if Device is offline/online
            //     $query_CheckDeviceStatus = "SELECT device,is_active FROM devices_v WHERE device = ? AND is_active = ?";
            //     $_CheckDeviceStatus = $conn->prepare($query_CheckDeviceStatus);
            //     $_CheckDeviceStatus->execute($device_id, 1);
            //     if ($_CheckDeviceStatus->rowCount() !== 0) {
            //         //TODO --> Online Insert Device Readings
            //         $query_AddReadings = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
            //         $_AddReadings = $conn->prepare($query_AddReadings);
            //         $_AddReadings->execute([$device_id, $device_data]);
            //     } else {
            //         //! --> Offline == DO Nothing
            //     }
            // } else {
            //     //TODO Add Device Information
            // $query_AddDevice = "INSERT INTO devices_tbl(device_id,location,is_active) VALUES(?,?,?)";
            // $_AddDevice = $conn->prepare($query_AddDevice);
            // $_AddDevice->execute([$device_id, $device_location, 1]);
            // //TODO Add Readings
            // $query_AddReadings = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
            // $_AddReadings = $conn->prepare($query_AddReadings);
            // $_AddReadings->execute([$device_id, $device_data]);
            // }
            // $query_test_device = "SELECT * FROM devices_tbl WHERE device_id = ?";
            // $_test_device = $conn->prepare($query_test_device);
            // $_test_device->execute([$device_id]);
            // if ($_test_device->rowCount() !== 0) {
            //     // If Device is found              
            //     //TODO Add Readings
            //     $query_AddReadings = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
            //     $_AddReadings = $conn->prepare($query_AddReadings);
            //     $_AddReadings->execute([$device_id, $device_data]);
            // } else {
            //     //TODO Add Device Information
            //     $query_AddDevice = "INSERT INTO devices_tbl(device_id,location,is_active) VALUES(?,?,?)";
            //     $_AddDevice = $conn->prepare($query_AddDevice);
            //     $_AddDevice->execute([$device_id, $device_location, 1]);
            //     //TODO Add Readings
            //     $query_AddReadings = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
            //     $_AddReadings = $conn->prepare($query_AddReadings);
            //     $_AddReadings->execute([$device_id, $device_data]);
            // }
            //TODO Add Readings
            // $query_AddDevice = "INSERT INTO devices_tbl(device_id,`location`,is_active) VALUES(?,?,?)";
            // $_AddDevice = $conn->prepare($query_AddDevice);
            // $_AddDevice->execute([$device_id, $device_location, 1]);
            // $query_AddReadings = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
            // $_AddReadings = $conn->prepare($query_AddReadings);
            // $_AddReadings->execute([$device_id, $device_data]);
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
} else {
    echo "No Valid Requests Made!";
}
