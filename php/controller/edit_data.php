<?php

require_once "../model/database.php";


class edit_data extends DBConn
{
    private function set_data($device, $location, $is_active)
    {
        $conn = parent::set_connection();
        $query_check_device = 'SELECT device FROM devices_v WHERE device = ?';
        $_check_device = $conn->prepare($query_check_device);
        $_check_device->execute([$device]);
        $device_status = "";
        if ($is_active == 1) {
            $device_status .= "Online";
        } else {
            $device_status .= "Offline";
        }
        if ($_check_device->rowCount() !== 0) {
            $query_edit_device = 'UPDATE devices_tbl SET location = ?, is_active = ? ,device_status = ? WHERE device_id = ?';
            $_edit_device = $conn->prepare($query_edit_device);
            $_edit_device->execute([$location, $is_active, $device_status, $device]);
            echo json_encode([
                'status' => 1,
                'msg' => "Device information has been Updated",
                'goto' => '../?deviceList'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => "Device does not exist!"
            ]);
        }
    }
    public function update_device($device, $location, $is_active)
    {
        $this->set_data($device, $location, $is_active);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $device = $_POST['device'];
    $location = $_POST['location'];
    $is_active = $_POST['is_active'];
    $init = new edit_data;
    $init->update_device($device, $location, $is_active);
} else {
    echo "No Valid Requests Made!";
}
