<?php

require "../model/database.php";

class post_data extends DBConn
{
    public function AddSensorData(
        $device_id,
        $device_location,
        $sensor_data,
        $is_active
    ) {
        $conn = parent::set_connection();
        $sql_check_device = "SELECT * FROM devices_tbl WHERE device_id = '$device_id'";
        $_check_device = $conn->query($sql_check_device);
        if ($_check_device->rowCount() !== 0) {
            // If device is found insert sensor
            $query_insert_sensor = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
            $_insert_sensor = $conn->prepare($query_insert_sensor);
            $_insert_sensor->execute([$device_id, $sensor_data]);
        } else {
            // If device is not found insert device info
            $query_insert_device = "INSERT INTO devices_tbl(device_id,`location`,is_active) VALUES(?,?,?)";
            $_insert_device = $conn->prepare($query_insert_device);
            $_insert_device->execute([$device_id, $device_location, $is_active]);
            // Insert readings
            $query_insert_sensor = "INSERT INTO readings_tbl(device_id,sensor_data) VALUES(?,?)";
            $_insert_sensor = $conn->prepare($query_insert_sensor);
            $_insert_sensor->execute([$device_id, $sensor_data]);
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $device_id =     $_POST['d_id']; //device_id
    $device_location = $_POST['d_l']; // Device Location
    $sensor_data =      $_POST['d_d'];  //sensor_data
    $is_active = 1;
    $init = new post_data;
    $init->AddSensorData(
        $device_id,
        $device_location,
        $sensor_data,
        $is_active
    );
}
