<?php

require_once "../model/database.php";


class fetch_data extends DBConn
{
    public function get_dates()
    {
        try {
            //code...
            $conn = parent::set_connection();
            $query_date_readings = "SELECT * FROM date_readings_v ORDER BY date_entry ASC";
            $_date_readings = $conn->query($query_date_readings);
            $options = "";
            foreach ($_date_readings->fetchAll() as $date_readings_rows) {
                $options .= "<option value='$date_readings_rows->date_entry'>" . $date_readings_rows->date_entry . "</option>";
            }
            echo json_encode([
                'date' => $options
            ]);
        } catch (PDOException $th) {
            //throw $th;
            die('ERROR : ' . $th->getMessage() . "<br>");
        }
    }
    public function get_devices()
    {
        try {
            //code...
            $conn = parent::set_connection();
            $query_device_information = "SELECT * FROM devices_v ORDER BY device ASC";
            $_device_information = $conn->query($query_device_information);
            $options = "";
            $location = "";
            foreach ($_device_information->fetchAll() as $device_readings_rows) {
                $options .= "<option value='$device_readings_rows->device'>" . $device_readings_rows->device . "</option>";
                $location .=  $device_readings_rows->location;
            }
            echo json_encode([
                'device' => $options
            ]);
        } catch (PDOException $th) {
            //throw $th;
            die('ERROR : ' . $th->getMessage() . "<br>");
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $init = new fetch_data;

    if (isset($_GET['get_date'])) {
        $init->get_dates();
    }
    if (isset($_GET['get_device'])) {
        $init->get_devices();
    }
} else {
    echo "No Posts Made!";
}
